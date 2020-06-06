<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'positions';

    protected $fillable = [
        'name',
    ];

    public const POSITIONS = [
        1 => 'Point Guard',
        2 => 'Shooting Guard',
        3 => 'Small Forward',
        4 => 'Power Forward',
        5 => 'Center',
    ];
}
