<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Services\CategoryService;
use App\Http\DTOs\Requests\CategoryRequestDTO;
use Exception;

class CategoryController extends Controller
{
    private CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function getAllCategories()
    {
        $categories = $this->categoryService->getAllCategories();

        return $categories
            ? response()->json($categories, 200)
            : response()->json(['message' => 'No categories', 404]);
    }

    public function getCategoryById($id)
    {
        $category = $this->categoryService->getCategoryById($id);

        return $category
            ? response()->json($category, 200)
            : response()->json(['message' => 'Category not found', 404]);
    }

    public function addCategory(CategoryRequest $categoryRequest)
    {
        $categoryRequestDTO = new CategoryRequestDTO($categoryRequest);
        try {
            $this->categoryService->addCategory($categoryRequestDTO);
            return response()->json(['success' => 'Category add successfully.'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
