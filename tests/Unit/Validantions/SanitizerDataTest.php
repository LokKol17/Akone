<?php

namespace Validantions;

use App\Http\Controllers\UploadController\UploadFunctions\SanitizerUpload;
use App\Http\Controllers\UploadController\UploadFunctions\Validations;
use App\Models\Anime;
use Tests\TestCase;

class SanitizerDataTest extends TestCase
{
    public function testSanitizeUploadString()
    {
        $string = 'This is a string';
        $this->assertEquals('this_is_a_string', SanitizerUpload::sanitize($string));
    }

    public function testConvertAnimeObjectToArray()
    {
        $anime = new Anime();
        $anime->nome = 'Teste';
        $anime->sinopse = 'Teste';
        $anime->imagem_path = 'Teste';

        $animeArray = Validations::getAnimeData($anime);
        $this->assertIsArray($animeArray);
        $this->assertArrayHasKey('nome', $animeArray);
        $this->assertArrayHasKey('sinopse', $animeArray);
        $this->assertArrayHasKey('imagem_path', $animeArray);
        $this->assertEquals('Teste', $animeArray['nome']);
        $this->assertEquals('Teste', $animeArray['sinopse']);
        $this->assertEquals('Teste', $animeArray['imagem_path']);
    }
}
