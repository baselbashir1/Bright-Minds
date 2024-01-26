<?php

namespace App\Http\DTOs\Requests;

use App\Http\Requests\AnswerRequest;

class AnswerRequestDTO
{
    private $userId;
    private $questionId;
    private $answer;

    public function __construct(AnswerRequest $answerRequest)
    {
        $validatedData = $answerRequest->validated();
        $this->userId = $validatedData['user_id'];
        $this->questionId = $validatedData['question_id'];
        $this->userId = $validatedData['answer'];
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getQuestionId()
    {
        return $this->questionId;
    }

    public function getAnswer()
    {
        return $this->answer;
    }
}
