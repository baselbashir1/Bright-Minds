<?php

namespace App\Http\Services;

use App\Http\DTOs\Requests\CategoryRequestDTO;
use App\Http\Repositories\CategoryRepository;
use Exception;

class CategoryService
{
    private CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getAllCategories()
    {
        return $this->categoryRepository->getAllCategories();
    }

    public function getCategoryById($id)
    {
        return $this->categoryRepository->getCategoryById($id);
    }

    public function addCategory(CategoryRequestDTO $categoryRequestDTO)
    {
        try {
            $data = [
                'name' => $categoryRequestDTO->getName(),
            ];

            return $this->categoryRepository->createCategory($data);

        } catch (Exception $e) {
            throw new Exception("Failed to add category: " . $e->getMessage(), 500, $e);
        }
    }
}
