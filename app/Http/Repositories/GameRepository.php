<?php

namespace App\Http\Repositories;

use App\Models\Game;
use App\Http\Resources\GameResource;
use App\Http\DTOs\Responses\GameResponseDTO;

class GameRepository implements GameRepositoryInterface
{
    public function getAllGames()
    {
        $games = Game::all();

        $gameResponse = $games->map(function ($game) {
            return new GameResponseDTO($game->id, $game->name, $game->categoryId);
        });

        return GameResource::collection($gameResponse);
    }

    public function getGameById($id)
    {
        $game = Game::find($id);

        $gameResponse = new GameResponseDTO($game->id, $game->name, $game->categoryId);

        return new GameResource($gameResponse);
    }

    public function createGame(array $data)
    {
        return Game::create($data);
    }

    public function updateGame(array $data, $id)
    {
        return Game::find($id)->update($data);
    }

    public function deleteGame($id)
    {
        return Game::find($id)->delete();
    }

    public function getGameByCategoryId($categoryId)
    {
        $games = Game::where('category_id', $categoryId)->get();

        $gameResponse = $games->map(function ($game) {
            return new GameResponseDTO($game->id, $game->name, $game->categoryId);
        });

        return GameResource::collection($gameResponse);
    }
}
