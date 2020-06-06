<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ApiTrait;

class Comment extends Model
{
    use ApiTrait;

    const ENDPOINT = 'http://jsonplaceholder.typicode.com/comments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id', 'name', 'email', 'body',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
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
                'post_id' => $responseItem['postId'],
                'name' => $responseItem['name'],
                'email' => $responseItem['email'],
                'body' => $responseItem['body'],
            ]);
        }
    }

}
