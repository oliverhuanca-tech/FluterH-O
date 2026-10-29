<?php
//examen
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Torta extends Model
{
    protected $table = 'tortas';

    protected $fillable = [
        'sabor',
        'precio',
        'stock',
    ];
}