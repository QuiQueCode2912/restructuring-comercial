<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupon extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'cupones';

    protected $fillable = [
        'id',
        'tipo',
        'estado',
        'cantidad',
        'consumible',
        'decimal',
        'fechainicial',
        'fechafinal',
        'codigo',
        'validopara',
        'sfid'
    ];

    protected $casts = [
        'fechainicial' => 'datetime',
        'fechafinal' => 'datetime',
    ];
}
