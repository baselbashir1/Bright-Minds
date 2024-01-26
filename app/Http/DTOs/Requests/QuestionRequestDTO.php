<?php

namespace App\Http\DTOs\Requests;

use App\Http\Requests\QuestionRequest;

class QuestionRequestDTO
{
    private $question;

    public function __construct(QuestionRequest $questionRequest)
    {
        $validatedData = $questionRequest;
        $this->question = $validatedData['question'];
    }

    public function getQuestion()
    {
        return $this->question;
    }
}
