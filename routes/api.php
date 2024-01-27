<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ProgressController;
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

Route::controller(GameController::class)->group(function () {
    Route::get('/getAllGames', 'getAllGames');
    Route::get('/getGameById/{id}', 'getGameById');
    Route::get('/getGameByCategoryId/{categoryId}', 'getGameByCategoryId');
});

Route::controller(QuestionController::class)->group(function () {
    Route::get('/getAllQuestions', 'getAllQuestions');
    Route::get('/getQuestionById/{questionId}', 'getQuestionById');
    Route::post('/addQuestion', 'addQuestion');
});

Route::controller(AnswerController::class)->group(function () {
    Route::get('/getAnswerByUserId/{userId}', 'getAnswerByUserId');
    Route::get('/getAnswerByUserIdAndQuestionId/{userId}/{questionId}', 'getAnswerByUserIdAndQuestionId');
    Route::post('/addAnswer', 'addAnswer');
});

Route::controller(ProgressController::class)->group(function () {
    Route::get('/getProgressById/{id}', 'getProgressById');
    Route::get('/getProgressByUserId/{userId}', 'getProgressByUserId');
    Route::get('/getProgressByGameId/{gameId}', 'getProgressByGameId');
    Route::get('/getProgressByUserIdAndGameId/{userId}/{gameId}', 'getProgressByUserIdAndGameId');
    Route::post('/addProgress', 'addProgress');
});
