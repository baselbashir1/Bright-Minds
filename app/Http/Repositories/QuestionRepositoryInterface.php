<?php

namespace App\Http\Repositories;

interface QuestionRepositoryInterface {

    public function getAllQuestions();
    public function getQuestionById($id);
    public function createQuestion(array $data);
    public function updateQuestion(array $data, $id);
    public function deleteQuestion($id);

}
