<?php

namespace App\Http\Repositories;

interface ProgressRepositoryInterface
{
    public function getAllProgress();
    public function getProgressById($id);
    public function createProgress(array $data);
    public function updateProgress(array $data, $id);
    public function deleteProgress($id);
}
