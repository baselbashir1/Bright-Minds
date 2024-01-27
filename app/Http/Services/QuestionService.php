<?php

namespace App\Http\Services;

use App\Http\DTOs\Requests\QuestionRequestDTO;
use App\Http\Repositories\QuestionRepository;
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
        return $this->questionRepository->getQuestionById($questionId);
    }

    public function addQuestion(QuestionRequestDTO $questionRequestDTO)
    {
        try {
            $data = [
                'question' => $questionRequestDTO->getQuestion(),
            ];

            return $this->questionRepository->createQuestion($data);

        } catch (Exception $e) {
            throw new Exception("Failed to add question: " . $e->getMessage(), 500, $e);
        }
    }
}
