<?php

namespace App\Http\Services;

use App\Http\DTOs\Requests\AnswerRequestDTO;
use App\Http\DTOs\Responses\AnswerResponseDTO;
use App\Http\Repositories\AnswerRepository;
use Exception;

class AnswerService
{
    private AnswerRepository $answerRepository;

    public function __construct(AnswerRepository $answerRepository)
    {
        $this->answerRepository = $answerRepository;
    }

    public function getAnswerByUserId($userId)
    {
        $answer = $this->answerRepository->getAnswerByUserId($userId);
        return $answer ? new AnswerResponseDTO($answer) : null;
    }

    public function getAnswerByUserIdAndQuestionId($userId, $questionId)
    {
        $answer = $this->answerRepository->getAnswerByUserIdAndQuestionId($userId, $questionId);
        return $answer ? new AnswerResponseDTO($answer) : null;
    }

    public function addAnswer(AnswerRequestDTO $answerRequestDTO)
    {
        try {
            $data = [
                'user_id' => $answerRequestDTO->getUserId(),
                'question_id' => $answerRequestDTO->getQuestionId(),
                'answer' => $answerRequestDTO->getAnswer(),
            ];

            return $this->answerRepository->createAnswer($data);

        } catch (Exception $e) {
            throw new Exception("Failed to add answer: " . $e->getMessage(), 500, $e);
        }
    }
}
