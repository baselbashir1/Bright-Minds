<?php

namespace App\Http\Repositories;

use App\Http\DTOs\Requests\ProgressResponseDTO;
use App\Http\Resources\ProgressResource;
use App\Models\Progress;

class ProgressRepository implements ProgressRepositoryInterface
{
    public function getAllProgress()
    {
        $progresses = Progress::all();

        if ($progresses) {
            $progressResponse = $progresses->map(function ($progress) {
                return new ProgressResponseDTO($progress->id, $progress->user_id, $progress->game_id, $progress->level, $progress->level_content, $progress->fails);
            });
            return ProgressResource::collection($progressResponse);
        }
    }

    public function getProgressById($id)
    {
        $progress = Progress::find($id);

        if ($progress) {
            $progressResponse = new ProgressResponseDTO($progress->id, $progress->user_id, $progress->game_id, $progress->level, $progress->level_content, $progress->fails);
            return new ProgressResource($progressResponse);
        }
    }

    public function getProgressByUserId($userId)
    {
        $progress = Progress::where('user_id', $userId)->latest()->first();

        if ($progress) {
            $progressResponse = new ProgressResponseDTO($progress->id, $progress->user_id, $progress->game_id, $progress->level, $progress->level_content, $progress->fails);
            return new ProgressResource($progressResponse);
        }
    }

    public function getProgressByGameId($gameId)
    {
        $progress = Progress::where('game_id', $gameId)->latest()->first();

        if ($progress) {
            $progressResponse = new ProgressResponseDTO($progress->id, $progress->user_id, $progress->game_id, $progress->level, $progress->level_content, $progress->fails);
            return new ProgressResource($progressResponse);
        }
    }

    public function getProgressByUserIdAndGameId($userId, $gameId)
    {
        $progress = Progress::where(['user_id' => $userId, 'game_id' => $gameId])->latest()->first();

        if ($progress) {
            $progressResponse = new ProgressResponseDTO($progress->id, $progress->user_id, $progress->game_id, $progress->level, $progress->level_content, $progress->fails);
            return new ProgressResource($progressResponse);
        }
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
