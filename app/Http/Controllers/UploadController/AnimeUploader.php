<?php

namespace App\Http\Controllers\UploadController;

use App\Http\Controllers\GeneralFunctions\AnimeHandler;
use App\Http\Controllers\UploadController\UploadFunctions\SanitizerUpload;
use App\Http\Controllers\UploadController\UploadFunctions\Validations;
use App\Models\Anime;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AnimeUploader
{
    private Request $request;
    private Anime $anime;

    public function __construct(Request $request, Anime $anime)
    {
        $this->request = $request;
        $this->anime = $anime;
    }

    public function upload(): RedirectResponse
    {
        $data = $this->validateSanitizeAndGetData();
        $this->renameAnimePath($data);
        $imageName = $this->storeOrUpdateAnimeCover($data);
        $this->updateAnimeModel($data, $imageName);
        return back()->with('mensagem', 'Arquivo editado com sucesso!');
    }

    private function validateSanitizeAndGetData(): array
    {
        $request = Validations::validateRequest($this->request);
        $anime = Validations::getAnimeData($this->anime);
        $anime['nome'] = SanitizerUpload::sanitize($request['nome']);
        $anime['imagem_path'] = AnimeHandler::updateAnimeImagePath($anime['nome']);
        $anime['sinopse'] = $request['sinopse'];
        $anime['capa'] = $request['capa'] ?? null;
        return $anime;
    }

    private function renameAnimePath($data): void
    {
        $newAnimeName = SanitizerUpload::sanitize($data['nome']);
        AnimeHandler::renameAnimePath($newAnimeName, $this->anime->nome);
    }

    private function storeOrUpdateAnimeCover($data): string
    {
        if (!is_null($data['capa'])) {
            $imageName = $data['capa']->hashName();
            AnimeHandler::storeAnimeCover($data['nome'], $data['capa']);
            AnimeHandler::removeOldAnimeCover($data['nome'], $this->anime->imagem_path);
        } else {
            $imagePath = $this->anime->imagem_path;
            $imageName = explode('/', $imagePath)[3];
        }
        return AnimeHandler::updateAnimeCoverPath($data['nome'], $imageName);
    }

    private function updateAnimeModel($data, $imageName): void
    {
        $this->anime->fill(['nome' => $data['nome'], 'sinopse' => $data['sinopse'], 'imagem_path' => $imageName]);
        $this->anime->save();
    }
}
