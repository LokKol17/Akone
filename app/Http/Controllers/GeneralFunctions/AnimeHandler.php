<?php

namespace App\Http\Controllers\GeneralFunctions;

use App\Models\Anime;
use Illuminate\Http\RedirectResponse;
use Storage;

class AnimeHandler
{
    const DEFAULT_IMAGE_PATH = 'storage/animes/default/default.png';
    const PATH_TO_ANIMES_DIRECTORY = 'public/animes/';
    const STORAGE_PATH_TO_ANIMES_DIRECTORY = 'storage/animes/';

    public static function removeOldAnimeCover(string $animeName, string $fullOldAnimeCoverPath): void
    {
        Storage::delete(self::PATH_TO_ANIMES_DIRECTORY . $animeName . '/' . explode('/', $fullOldAnimeCoverPath)[3]);
    }
    public static function storeAnimeCover(string $animeName, $file): void
    {
        Storage::put(self::PATH_TO_ANIMES_DIRECTORY . $animeName, $file);
    }

    public static function renameAnimePath(string $newAnimeName, string $oldAnimeName): void
    {
        if ($newAnimeName != $oldAnimeName) {
            rename(self::STORAGE_PATH_TO_ANIMES_DIRECTORY . $oldAnimeName, self::STORAGE_PATH_TO_ANIMES_DIRECTORY . $newAnimeName);
        }
    }

    public static function updateAnimeImagePath(string $animeName): string
    {
        $path = self::DEFAULT_IMAGE_PATH;
        $parts = explode('/', $path);
        $parts[2] = $animeName;
        return implode('/', $parts); // storage/animes/{nome}/default.png
    }

    public static function getAnime(int|string $id)
    {
        if (is_numeric($id)) {
            $anime = Anime::find($id);
        } else {
            $anime = Anime::where('nome', $id)->first();
        }
        if ($anime == null) {
            throw new \InvalidArgumentException('Anime not found');
        }

        return $anime;
    }

    public static function createNewAnimeDirectory(string $animeName): void
    {
        Storage::makeDirectory(self::PATH_TO_ANIMES_DIRECTORY . $animeName);
    }

    public static function UpdateAnimeCoverPath(string $animeName, $hashName): string
    {
        return self::STORAGE_PATH_TO_ANIMES_DIRECTORY . $animeName . '/' . $hashName;
    }
}
