<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model{

   

    protected $fillable = [
        'id',
        'name',
        'email',
        'password'
    ];

    protected $table = 'usuarios';

    public $timestamps = false;

}