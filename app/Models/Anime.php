<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[\AllowDynamicProperties]
class Anime extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'nome',
        'sinopse',
        'imagem_path',
    ];

    protected $table = 'animes';

    public function getFormatedName()
    {
        return str_replace('_', ' ', $this->nome);
    }

}
