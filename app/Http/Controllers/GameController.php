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
        $games = $this->gameService->getAllGames();

        return $games
            ? response()->json($games, 200)
            : response()->json(['message' => 'No games'], 404);
    }

    public function getGameById($id)
    {
        $game = $this->gameService->getGameById($id);

        return $game
            ? response()->json($game, 200)
            : response()->json(['message' => 'Game not found'], 404);
    }

    public function getGameByCategoryId($categoryId)
    {
        $game = $this->gameService->getGameByCategoryId($categoryId);

        return $game
            ? response()->json($game, 200)
            : response()->json(['message' => 'Game not found'], 404);
    }
}
