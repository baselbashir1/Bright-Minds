<?php

namespace App\Http\Services;

use App\Http\Repositories\AnswerRepository;
use App\Http\Requests\AnswerRequest;
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
        return $this->answerRepository->getAnswerByUserId($userId) ?? null;
    }

    public function getAnswerByUserIdAndQuestionId($userId, $questionId)
    {
        return $this->answerRepository->getAnswerByUserIdAndQuestionId($userId, $questionId) ?? null;
    }

    public function addAnswer(AnswerRequest $answerRequest)
    {
        try {
            $requestData = $answerRequest->validated();

            $data = [
                'user_id' => $requestData['user_id'],
                'question_id' => $requestData['question_id'],
                'answer' => $requestData['answer'],
            ];

            return $this->answerRepository->createAnswer($data);

        } catch (Exception $e) {
            throw new Exception("Failed to add answer: " . $e->getMessage(), 500, $e);
        }
    }
}
