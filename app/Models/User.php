<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Traits\ApiTrait;

class User extends Authenticatable
{
    use ApiTrait, Notifiable;

    const ENDPOINT = 'http://jsonplaceholder.typicode.com/users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRouteKeyName()
    {
        return 'id';
    }

    public function posts()
    {
      return $this->hasMany(Post::class);
    }

    public static function cache()
    {
        $json = self::fetch(self::ENDPOINT);

        self::createModelsFromResponse($json);
    }

    public static function createModelsFromResponse(array $response)
    {
        foreach ($response as $responseItem) {
            self::updateOrCreate([
                'id' => $responseItem['id'],
            ],[
                'id' => $responseItem['id'],
                'name' => $responseItem['name'],
                'username' => $responseItem['username'],
                'email' => $responseItem['email'],
            ]);
        }
    }

}
