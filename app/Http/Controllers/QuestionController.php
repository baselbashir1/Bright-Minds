<?php

namespace App\Http\Controllers;

use App\Http\DTOs\Requests\QuestionRequestDTO;
use App\Http\DTOs\Responses\QuestionResponseDTO;
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
        $questions = $this->questionService->getAllQuestions();

        return $questions
            ? response()->json($questions, 200)
            : response()->json(['message' => 'No questions'], 404);
    }

    public function getQuestionById($questionId)
    {
        $question = $this->questionService->getQuestionById($questionId);

        return $question
            ? response()->json($question, 200)
            : response()->json(['message' => 'Question not found'], 404);
    }

    public function addQuestion(QuestionRequest $questionRequest)
    {
        $questionRequestDTO = new QuestionRequestDTO($questionRequest);
        try {
            $question = $this->questionService->addQuestion($questionRequestDTO);
            return response()->json($question, 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
