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

        if ($answers) {
            $answerResponse = $answers->map(function ($answer) {
                return new AnswerResponseDTO($answer->id, $answer->user_id, $answer->question_id, $answer->answer);
            });
            return AnswerResource::collection($answerResponse);
        }
    }

    public function getAnswerById($id)
    {
        $answer = Answer::find($id);

        if ($answer) {
            $answerResponse = new AnswerResponseDTO($answer->id, $answer->user_id, $answer->question_id, $answer->answer);
            return new AnswerResource($answerResponse);
        }
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
        $answer = Answer::where('user_id', $userId)->first();

        if ($answer) {
            $answerResponse = new AnswerResponseDTO($answer->id, $answer->user_id, $answer->question_id, $answer->answer);
            return new AnswerResource($answerResponse);
        }
    }

    public function getAnswerByUserIdAndQuestionId($userId, $questionId)
    {
        $answer = Answer::where(['user_id' => $userId, 'question_id' => $questionId])->first();

        if ($answer) {
            $answerResponse = new AnswerResponseDTO($answer->id, $answer->user_id, $answer->question_id, $answer->answer);
            return new AnswerResource($answerResponse);
        }
    }
}
