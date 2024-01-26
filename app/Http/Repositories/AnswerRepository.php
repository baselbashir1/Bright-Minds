<?php

namespace App\Http\Repositories;
use App\Models\Answer;

class AnswerRepository implements AnswerRepositoryInterface
{
    public function getAllAnswers()
    {
        return Answer::all();
    }

    public function getAnswerById($id)
    {
        return Answer::find($id);
    }

    public function createAnswer(array $data)
    {
        return Answer::create($data);
    }

    public function updateAnswer(array $data, $id)
    {
        return Answer::find($id)->update($data);
    }

    public function deleteAnswer($id)
    {
        return Answer::find($id)->delete();
    }

    public function getAnswerByUserId($userId)
    {
        return Answer::where('user_id', $userId)->first();
    }

    public function getAnswerByUserIdAndQuestionId($userId, $questionId)
    {
        return Answer::where(['user_id' => $userId, 'question_id' => $questionId])->first();
    }
}
