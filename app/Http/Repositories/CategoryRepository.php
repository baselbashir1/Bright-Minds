<?php

namespace App\Http\Repositories;

use App\Http\DTOs\Responses\CategoryResponseDTO;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAllCategories()
    {
        $categories = Category::all();

        if ($categories) {
            $categoriesResponse = $categories->map(function ($category) {
                return new CategoryResponseDTO($category->id, $category->name);
            });
            return CategoryResource::collection($categoriesResponse);
        }
    }

    public function getCategoryById($id)
    {
        $category = Category::find($id);

        if ($category) {
            $categoryResponse = new CategoryResponseDTO($category->id, $category->name);
            return new CategoryResource($categoryResponse);
        }
    }

    public function createCategory(array $data)
    {
        return Category::create($data);
    }

    public function updateCategory(array $data, $id)
    {
        return Category::find($id)->update($data);
    }

    public function deleteCategory($id)
    {
        return Category::find($id)->delete;
    }
}
