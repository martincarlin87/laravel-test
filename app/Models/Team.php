<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'teams';

    protected $fillable = [
        'name',
    ];

    public const TEAMS = [
        1 => 'Atlanta Hawks',
        2 => 'Boston Celtics',
        3 => 'Brooklyn Nets',
        4 => 'Charlotte Hornets',
        5 => 'Chicago Bulls',
        6 => 'Cleveland Cavaliers',
        7 => 'Dallas Mavericks',
        8 => 'Denver Nuggets',
        9 => 'Detroit Pistons',
        10 => 'Golden State Warriors',
        11 => 'Housston Rockets',
        12 => 'Indiana Pacers',
        13 => 'LA Clippers',
        14 => 'Los Anageles Lakers',
        15 => 'Memphis Grizzlies',
        16 => 'Miami Heat',
        17 => 'Milwaukee Bucks',
        18 => 'Minnesota Timberwolves',
        19 => 'New Orleans Pelicans',
        20 => 'New York Knicks',
        21 => 'Oklahome City Thunder',
        22 => 'Orlando Magic',
        23 => 'Philadelphia 76ers',
        24 => 'Phoenix Suns',
        25 => 'Portland Trail Blazers',
        26 => 'Sacramento Kings',
        27 => 'San Antonia Spurs',
        28 => 'Toronto Raptos',
        29 => 'Utah Jazz',
        30 => 'Washington Wizards',
    ];
}
