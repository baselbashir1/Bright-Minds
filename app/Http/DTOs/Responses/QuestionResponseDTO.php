<?php

namespace App\Http\DTOs\Responses;

use App\Models\Question;

class QuestionResponseDTO
{
    private $question;

    public function __construct(Question $question)
    {
        $this->question = $question->question;
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
