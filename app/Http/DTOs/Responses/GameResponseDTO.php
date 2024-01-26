<?php

namespace App\Http\DTOs\Responses;

use App\Models\Game;

class GameResponseDTO
{
    private $name;
    private $categoryId;

    public function __construct(Game $game)
    {
        $this->name = $game->name;
        $this->categoryId = $game->category_id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    public function getCategoryId()
    {
        return $this->categoryId;
    }
}
