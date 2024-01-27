<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProgressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->getId(),
            'userId' => $this->getUserId(),
            'gameId' => $this->getGameId(),
            'level' => $this->getLevel(),
            'levelContent' => $this->getLevelContent(),
            'fails' => $this->getFails(),
        ];
    }
}
