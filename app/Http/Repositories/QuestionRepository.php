<?php

namespace App\Http\Repositories;
use App\Models\Question;

class QuestionRepository implements QuestionRepositoryInterface
{

    public function getAllQuestions()
    {
        return Question::all();
    }

    public function getQuestionById($id)
    {
        return Question::find($id);
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
