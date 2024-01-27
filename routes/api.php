<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\QuestionController;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/getAllGames', [GameController::class, 'getAllGames']);
Route::get('/getGameById/{id}', [GameController::class, 'getGameById']);
Route::get('/getGameByCategoryId/{categoryId}', [GameController::class, 'getGameByCategoryId']);


Route::get('/getAllQuestions', [QuestionController::class, 'getAllQuestions']);
Route::post('/addQuestion', [QuestionController::class, 'addQuestion']);
