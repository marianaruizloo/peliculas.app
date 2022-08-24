<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    use HasFactory;

    static $rules = [
        'user_id' => 'required',
        'pelicula_id' => 'required',
    ];

    protected $fillable = ['user_id', 'pelicula_id'];
}
