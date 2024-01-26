<?php

namespace App\Http\Repositories;

interface GameRepositoryInterface
{
    public function getAllGames();
    public function getGameById($id);
    public function createGame(array $data);
    public function updateGame(array $data, $id);
    public function deleteGame($id);
    public function getGameByCategoryId($categoryId);
}
