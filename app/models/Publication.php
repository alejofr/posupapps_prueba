<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model{

    protected $fillable = [
        'id',
        'titulo',
        'contenido',
        'autor',
        'fecha_publicacion'
    ];

    protected $table = 'publicaciones';

    public $timestamps = false;

}