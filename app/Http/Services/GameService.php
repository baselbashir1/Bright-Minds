<?php

namespace App\Http\Services;

use App\Http\DTOs\Responses\GameResponseDTO;
use App\Http\Repositories\GameRepository;

class GameService
{
    private GameRepository $gameRepository;

    public function __construct(GameRepository $gameRepository)
    {
        $this->gameRepository = $gameRepository;
    }

    public function getAllGames()
    {
        return $this->gameRepository->getAllGames();
    }

    public function getGameById($id)
    {
        return $this->gameRepository->getGameById($id);
    }

    public function getGameByCategoryId($categoryId)
    {
        return $this->gameRepository->getGameByCategoryId($categoryId);
    }
}
