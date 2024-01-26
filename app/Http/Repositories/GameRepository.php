<?php

namespace App\Http\Repositories;

use App\Models\Game;

class GameRepository implements GameRepositoryInterface
{
    public function getAllGames()
    {
        return Game::all();
    }

    public function getGameById($id)
    {
        return Game::find($id);
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
        return Game::where(['category_id' => $categoryId])->get();
    }
}
