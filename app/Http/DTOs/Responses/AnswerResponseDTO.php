<?php

namespace App\Http\DTOs\Responses;

use App\Models\Answer;

class AnswerResponseDTO
{
    private $id;
    private $userId;
    private $questionId;
    private $answer;

    public function __construct($id, $userId, $questionId, $answer)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->questionId = $questionId;
        $this->answer = $answer;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
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
