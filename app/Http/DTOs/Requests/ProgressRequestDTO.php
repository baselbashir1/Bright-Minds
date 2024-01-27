<?php

namespace App\Http\DTOs\Requests;

use App\Http\Requests\ProgressRequest;

class ProgressRequestDTO
{
    private $userId;
    private $gameId;
    private $level;
    private $levelContent;
    private $fails;

    public function __construct(ProgressRequest $progressRequest)
    {
        $validatedData = $progressRequest->validated();
        $this->userId = $validatedData['userId'];
        $this->gameId = $validatedData['gameId'];
        $this->level = $validatedData['level'];
        $this->levelContent = $validatedData['levelContent'];
        $this->fails = $validatedData['fails'];
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getGameId()
    {
        return $this->gameId;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function getLevelContent()
    {
        return $this->levelContent;
    }

    public function getFails()
    {
        return $this->fails;
    }
}
