<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pelicula
 *
 * @property $id
 * @property $titulo
 * @property $director
 * @property $descripcion
 * @property $duracion
 * @property $urltrailer
 * @property $categoria_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Categoria $categoria
 * @property Favorito[] $favoritos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pelicula extends Model
{
    
    static $rules = [
		'titulo' => 'required',
		'director' => 'required',
		'descripcion' => 'required',
		'duracion' => 'required',
		'urltrailer' => 'required',
		'categoria_id' => 'required',
        'imagen' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['titulo','director','descripcion','duracion','urltrailer','categoria_id', 'imagen'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoria()
    {
        return $this->hasOne('App\Models\Categoria', 'id', 'categoria_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function usuarios()
    {
        return $this->belongsToMany('App\Models\User', 'favoritos', 'pelicula_id', 'user_id');
    }
    

}
