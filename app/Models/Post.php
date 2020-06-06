<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ApiTrait;

class Post extends Model
{
    use ApiTrait;

    const ENDPOINT = 'http://jsonplaceholder.typicode.com/posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'body',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
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
                'user_id' => $responseItem['userId'],
                'title' => $responseItem['title'],
                'body' => $responseItem['body'],
            ]);
        }
    }

}
