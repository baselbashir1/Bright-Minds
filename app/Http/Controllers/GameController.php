<?php

namespace App\Http\Controllers;

use App\Http\Services\GameService;

class GameController extends Controller
{
    private GameService $gameService;

    public function __construct(GameService $gameService)
    {
        $this->gameService = $gameService;
    }

    public function getAllGames()
    {
        return $this->gameService->getAllGames();
    }

    public function getGameByCategoryId($categoryId)
    {
        return $this->gameService->getGameByCategoryId($categoryId);
    }
}
