<?php

namespace App\Http\DTOs\Requests;

use App\Http\Requests\GameRequest;

class GameRequestDTO
{
    private $name;
    private $categoryId;

    public function __construct(GameRequest $gameRequest)
    {
        $validatedData = $gameRequest->validated();
        $this->name = $validatedData['name'];
        $this->categoryId = $validatedData['categoryId'];
    }

    public function getName()
    {
        return $this->name;
    }

    public function getCategoryId()
    {
        return $this->categoryId;
    }
}
