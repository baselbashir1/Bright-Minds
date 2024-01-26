<?php

namespace App\Http\Services;

use App\Http\Repositories\GameRepository;
use App\Http\Repositories\CategoryRepository;
use Exception;

class GameService
{
    private GameRepository $gameRepository;
    private CategoryRepository $categoryRepository;

    public function __construct(GameRepository $gameRepository, CategoryRepository $categoryRepository) {
        $this->gameRepository = $gameRepository;
        $this->categoryRepository = $categoryRepository;
    }

    // public function getGameByCategoryId($categoryId) {
    //     $category = $this->categoryRepository->getGameByCategoryId
    // }
}
