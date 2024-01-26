<?php

namespace App\Http\DTOs\Responses;

use App\Models\Answer;

class AnswerResponseDTO
{
    private $userId;
    private $questionId;
    private $answer;

    public function __construct(Answer $answer)
    {
        $this->userId = $answer->user_id;
        $this->questionId = $answer->question_id;
        $this->userId = $answer->answer;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setQuestionId($questionId)
    {
        $this->questionId = $questionId;
    }

    public function getQuestionId()
    {
        return $this->questionId;
    }

    public function setAnswer($answer)
    {
        $this->answer = $answer;
    }

    public function getAnswer()
    {
        return $this->answer;
    }
}
