<?php

namespace App\Http\Repositories;

interface AnswerRepositoryInterface
{
    public function getAllAnswers();
    public function getAnswerById($id);
    public function createAnswer(array $data);
    public function updateAnswer(array $data, $id);
    public function deleteAnswer($id);
    public function getAnswerByUserId($userId);
    public function getAnswerByUserIdAndQuestionId($userId, $questionId);
}
