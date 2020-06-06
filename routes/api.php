<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
// Default Laravel Route
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

/*
 * Rate limit to 20 requests per minute
 * https://laravel.com/docs/7.x/routing
*/
Route::middleware('throttle:20,1')->group(function () {

    /* User Routes */
    Route::get('users/{user}', 'User\UsersController@show');
    Route::get('users', 'User\UsersController@index');

    /* User Post Routes */
    Route::get('users/{user}/posts', 'User\UserPostsController@index');

    /* Post Comment Routes */
    Route::get('posts/{post}/comments', 'Post\PostCommentsController@index');

});

Route::fallback(function() {
    return response()->json(['message' => 'Not Found.'], 404);
})->name('api.fallback.404');



