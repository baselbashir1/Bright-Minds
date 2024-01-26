<?php

namespace App\Http\Repositories;
use App\Models\Progress;

class ProgressRepository implements ProgressRepositoryInterface
{
    public function getAllProgress()
    {
        return Progress::all();
    }

    public function getProgressById($id)
    {
        return Progress::find($id);
    }

    public function createProgress(array $data)
    {
        return Progress::create($data);
    }

    public function updateProgress(array $data, $id)
    {
        return Progress::find($id)->update($data);
    }

    public function deleteProgress($id)
    {
        return Progress::find($id)->delete;
    }
}
