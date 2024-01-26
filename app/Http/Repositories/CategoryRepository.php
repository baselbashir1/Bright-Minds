<?php

namespace App\Http\Repositories;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{

    public function getAllCategories()
    {
        return Category::all();
    }

    public function getCategoryById($id)
    {
        return Category::find($id);
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
