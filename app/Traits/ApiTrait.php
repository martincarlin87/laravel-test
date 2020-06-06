<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;

trait ApiTrait {

    /**
     * Feth json response from an endpoint
     *
     * @param string $url
     * @return array
     */
    public static function fetch(string $url): array
    {
        // https://laravel.com/docs/7.x/http-client
        return Http::retry(5, 100)
        ->withHeaders([
            'accept' => 'application/json'
        ])
        ->get($url)
        ->json();

    }

}
