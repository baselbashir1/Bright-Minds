<?php

namespace App\Http\Services;

use App\Http\DTOs\Requests\ProgressRequestDTO;
use App\Http\Repositories\ProgressRepository;
use Exception;

class ProgressService
{
    private ProgressRepository $progressRepository;
    public function __construct(ProgressRepository $progressRepository)
    {
        $this->progressRepository = $progressRepository;
    }

    public function getProgressById($id)
    {
        return $this->progressRepository->getProgressById($id);
    }

    public function getProgressByUserId($userId)
    {
        return $this->progressRepository->getProgressByUserId($userId);
    }

    public function getProgressByGameId($gameId)
    {
        return $this->progressRepository->getProgressByGameId($gameId);
    }

    public function getProgressByUserIdAndGameId($userId, $gameId)
    {
        return $this->progressRepository->getProgressByUserIdAndGameId($userId, $gameId);
    }

    public function addProgress(ProgressRequestDTO $progressRequestDTO)
    {
        try {
            $data = [
                'user_id' => $progressRequestDTO->getUserId(),
                'game_id' => $progressRequestDTO->getGameId(),
                'level' => $progressRequestDTO->getLevel(),
                'level_content' => $progressRequestDTO->getLevelContent(),
                'fails' => $progressRequestDTO->getFails(),
            ];

            return $this->progressRepository->createProgress($data);

        } catch (Exception $e) {
            throw new Exception("Failed to add progress: " . $e->getMessage(), 500, $e);
        }
    }
}
