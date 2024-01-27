<?php

namespace App\Http\DTOs\Requests;

use App\Http\Requests\ProgressRequest;

class ProgressResponseDTO
{
    private $id;
    private $userId;
    private $gameId;
    private $level;
    private $levelContent;
    private $fails;

    public function __construct($id, $userId, $gameId, $level, $levelContent, $fails)
    {
        $this->userId = $userId;
        $this->gameId = $gameId;
        $this->level = $level;
        $this->levelContent = $levelContent;
        $this->fails = $fails;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setGameId($gameId)
    {
        $this->gameId = $gameId;
    }

    public function getGameId()
    {
        return $this->gameId;
    }

    public function setLevel($level)
    {
        $this->level = $level;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function setLevelContent($levelContent)
    {
        $this->levelContent = $levelContent;
    }

    public function getLevelContent()
    {
        return $this->levelContent;
    }

    public function setFails($fails)
    {
        $this->fails = $fails;
    }

    public function getFails()
    {
        return $this->fails;
    }
}
