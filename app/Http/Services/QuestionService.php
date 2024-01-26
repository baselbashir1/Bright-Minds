<?php

namespace App\Http\Services;

use App\Http\Repositories\QuestionRepository;
use App\Http\Requests\QuestionRequest;
use Exception;

class QuestionService
{
    private QuestionRepository $questionRepository;

    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    public function getAllQuestions()
    {
        return $this->questionRepository->getAllQuestions();
    }

    public function getQuestionById($questionId)
    {
        return $this->questionRepository->getQuestionById($questionId) ?? null;
    }

    public function addQuestion(QuestionRequest $questionRequest)
    {
        try {
            $requestData = $questionRequest->validated();

            $data = [
                'question' => $requestData['$question'],
            ];

            return $this->questionRepository->createQuestion($data);

        } catch (Exception $e) {
            throw new Exception("Failed to add question: " . $e->getMessage(), 500, $e);
        }
    }
}
