<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Http\Services\QuestionService;
use Exception;

class QuestionController extends Controller
{
    private QuestionService $questionService;

    public function __construct(QuestionService $questionService)
    {
        $this->questionService = $questionService;
    }

    public function getAllQuestions()
    {
        return $this->questionService->getAllQuestions();
    }

    public function getQuestionById($questionId)
    {
        return $this->questionService->getQuestionById($questionId);
    }

    public function addQuestion(QuestionRequest $questionRequest)
    {
        try {
            $question = $this->questionService->addQuestion($questionRequest);
            return response()->json($question, 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
