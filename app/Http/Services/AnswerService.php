<?php

namespace App\Http\Services;

use App\Http\Repositories\AnswerRepository;
use App\Http\Repositories\QuestionRepository;
use App\Http\Repositories\UserRepository;
use App\Http\Requests\AnswerRequest;
use Exception;

class AnswerService
{
    private AnswerRepository $answerRepository;
    private UserRepository $userRepository;
    private QuestionRepository $questionRepository;

    public function __construct(AnswerRepository $answerRepository, UserRepository $userRepository, QuestionRepository $questionRepository)
    {
        $this->answerRepository = $answerRepository;
        $this->userRepository = $userRepository;
    }


    public function getAnswerByUserId($userId)
    {
        $answer = $this->answerRepository->getAnswerByUserId($userId);
        return $answer;
    }

    public function getAnswerByUserIdAndQuestionId($userId, $questionId)
    {
        $answer = $this->answerRepository->getAnswerByUserIdAndQuestionId($userId, $questionId);
        return $answer;
    }

    public function addAnswer(AnswerRequest $request)
    {
        try {
            $requestData = $request->validated();

            $data = [
                'user_id' => $requestData['user_id'],
                'question_id' => $requestData['question_id'],
                'answer' => $requestData['answer'],
            ];

            $answer = $this->answerRepository->createAnswer($data);

            return response()->json(["Success", $answer, 201]);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
