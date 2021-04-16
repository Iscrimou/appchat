<?php

use App\Http\Controllers\ChatController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/upload1', 'UploadController@upload');
Route::resource('upload', 'UploadController');

Route::group(['middleware' => 'auth:api'], function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/test', function () {
        return response()->success('Laravel api successful.',
            ['data' => 'Test api response']);
    });

    Route::get('/chat', function () {
        return response()->success('Chat successful.',
            ['data' => 'Chat response']);
    });

    Route::get('/chat/rooms', [ChatController::class, 'rooms']);
    Route::get('/chat/rooms/{roomId}/messages', [ChatController::class, 'messages']);
    Route::post('/chat/rooms/{roomId}/message', [ChatController::class, 'newMessages']);
    
});

Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');
