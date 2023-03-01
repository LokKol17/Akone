<?php

namespace Models;

use App\Models\Anime;
use Tests\TestCase;

class AnimeModelTest extends TestCase
{
    public function testCanCreateAAnimeModel()
    {
        $anime = new Anime();
        $anime->nome = 'Owari_no_seraph';
        $anime->sinopse = 'teste';
        $anime->imagem_path = 'teste';

        $this->assertInstanceOf(Anime::class, $anime);
        $this->assertEquals('Owari_no_seraph', $anime->nome);
        $this->assertEquals('teste', $anime->sinopse);
        $this->assertEquals('teste', $anime->imagem_path);
    }
}
