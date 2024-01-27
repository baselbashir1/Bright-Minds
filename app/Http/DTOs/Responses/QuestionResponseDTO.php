<?php

namespace App\Http\DTOs\Responses;

use App\Models\Question;

class QuestionResponseDTO
{
    private $id;
    private $question;

    public function __construct($id, $question)
    {
        $this->id = $id;
        $this->question = $question;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setQuestion($question)
    {
        $this->question = $question;
    }

    public function getQuestion()
    {
        return $this->question;
    }
}
