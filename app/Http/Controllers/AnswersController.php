<?php

namespace App\Http\Controllers;

use App\Http\Services\AnswerService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AnswersController extends Controller
{
    private AnswerService $answerService;

    public function __construct(AnswerService $answerService)
    {
        $this->answerService = $answerService;
    }

    public function getAnswerByUserId($userId)
    {
        $answer = $this->answerService->getAnswerByUserId($userId);
        return new Response($answer, 200);
    }
}
