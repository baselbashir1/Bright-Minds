<?php

namespace App\Http\Repositories;

use App\Models\Answer;
use App\Http\DTOs\Responses\AnswerResponseDTO;
use App\Http\Resources\AnswerResource;

class AnswerRepository implements AnswerRepositoryInterface
{
    public function getAllAnswers()
    {
        $answers = Answer::all();
        $answerResponse = $answers->map(function ($answer) {
            return new AnswerResponseDTO($answer->id, $answer->userId, $answer->questionId, $answer->answer);
        });

        return AnswerResource::collection($answerResponse);
    }

    public function getAnswerById($id)
    {
        $answer = Answer::find($id);
        $answerResponse = new AnswerResponseDTO($answer->id, $answer->userId, $answer->questionId, $answer->answer);
        return new AnswerResource($answerResponse);
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
