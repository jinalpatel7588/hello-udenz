<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ChatRoom\ChatRoomController;
use App\Http\Controllers\Api\Message\MessageController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('room')->group(function () {
    Route::post('create', [ChatRoomController::class, 'createChatRoom']);
    Route::post('get-chat', [MessageController::class, 'getChat']);
    Route::post('message', [MessageController::class, 'sendMessage']);
    Route::post('list', [ChatRoomController::class, 'getChatList']);
    Route::post('add-user', [ChatRoomController::class, 'addUserRoom']);
    Route::post('delete', [ChatRoomController::class, 'deleteChatRoom']);
    Route::post('leave', [ChatRoomController::class, 'leaveChatRoomMember']);
});

Route::post('getchatroommember ', [ChatRoomController::class, 'getChatRoomMember']);



