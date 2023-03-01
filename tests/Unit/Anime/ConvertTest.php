<?php

namespace Anime;

use App\Http\Controllers\GeneralFunctions\AnimeHandler;
use Tests\TestCase;

class ConvertTest extends TestCase
{
    const DEFAULT_IMAGE_PATH = 'storage/animes/default/default.png';

    public function testUpdateAnimeCover()
    {
        $animeName = AnimeHandler::UpdateAnimeCoverPath('one_piece', 'stringHashed.png');
        $this->assertEquals('storage/animes/one_piece/stringHashed.png', $animeName);
    }

    public function testUpdateAnimeImagePath()
    {
        $animeName = AnimeHandler::UpdateAnimeImagePath('one_piece');
        $this->assertEquals('storage/animes/one_piece/default.png', $animeName);
    }

}
