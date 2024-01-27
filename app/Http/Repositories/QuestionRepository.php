<?php

namespace App\Http\Repositories;

use App\Http\DTOs\Responses\QuestionResponseDTO;
use App\Http\Resources\QuestionResource;
use App\Models\Question;

class QuestionRepository implements QuestionRepositoryInterface
{

    public function getAllQuestions()
    {
        $questions = Question::all();

        if ($questions) {
            $questionsResponse = $questions->map(function ($question) {
                return new QuestionResponseDTO($question->id, $question->question);
            });
            return QuestionResource::collection($questionsResponse);
        }
    }

    public function getQuestionById($id)
    {
        $question = Question::find($id);

        if ($question) {
            $questionResponse = new QuestionResponseDTO($question->id, $question->question);
            return new QuestionResource($questionResponse);
        }
    }

    public function createQuestion(array $data)
    {
        return Question::create($data);
    }

    public function updateQuestion(array $data, $id)
    {
        return Question::find($id)->update($data);
    }

    public function deleteQuestion($id)
    {
        return Question::find($id)->delete;
    }
}
