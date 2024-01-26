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
        $games = $this->gameRepository->getAllGames();

        $gameDTOs = [];
        foreach ($games as $game) {
            $gameDTOs[] = new GameResponseDTO($game);
        }

        return $gameDTOs;
    }

    public function getGameByCategoryId($categoryId)
    {
        $game = $this->gameRepository->getGameByCategoryId($categoryId);
        return $game ? new GameResponseDTO($game) : null;
    }
}
