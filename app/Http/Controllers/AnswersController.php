<?php

namespace App\Http\Controllers;

use App\Http\DTOs\Requests\AnswerRequestDTO;
use App\Http\Requests\AnswerRequest;
use App\Http\Services\AnswerService;
use Exception;

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

        return $answer
            ? response()->json($answer, 200)
            : response()->json(['message' => 'Answer not found'], 404);
    }

    public function getAnswerByUserIdAndQuestionId($userId, $questionId)
    {
        $answer = $this->answerService->getAnswerByUserIdAndQuestionId($userId, $questionId);

        return $answer
            ? response()->json($answer, 200)
            : response()->json(['message' => 'Answer not found'], 404);
    }

    public function addAnswer(AnswerRequest $answerRequest)
    {
        $answerRequestDTO = new AnswerRequestDTO($answerRequest);
        try {
            $answer = $this->answerService->addAnswer($answerRequestDTO);
            return response()->json($answer, 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
