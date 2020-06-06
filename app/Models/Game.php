<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'games';

    protected $fillable = [
        'tip_off', 'home_team_id', 'away_team_id', 'home_team_points', 'away_team_points',
    ];
}
