<?php

namespace App\Http\Services;

use App\Http\DTOs\Requests\QuestionRequestDTO;
use App\Http\DTOs\Responses\QuestionResponseDTO;
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
        $questions = $this->questionRepository->getAllQuestions();

        $questionDTOs = [];
        foreach ($questions as $question) {
            $questionDTOs[] = new QuestionResponseDTO($question);
        }

        return $questionDTOs;
    }

    public function getQuestionById($questionId)
    {
        $question = $this->questionRepository->getQuestionById($questionId);
        return $question ? new QuestionResponseDTO($question) : null;
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
