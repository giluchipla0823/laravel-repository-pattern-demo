<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\V1\Author\AuthorController;

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


Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::get('logout', [AuthController::class, 'logout']);
});

// Route::group(['middleware' => 'auth:sanctum', 'prefix' => 'v1'], function() {
Route::group(['prefix' => 'v1'], function() {

    // Author
    Route::patch('/authors/{id}', [AuthorController::class, 'restore'])->name('authors.restore');
    Route::resource('authors', AuthorController::class, ['except' => ['create', 'edit']]);
});
