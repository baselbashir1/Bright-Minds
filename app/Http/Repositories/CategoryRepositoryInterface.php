<?php

namespace App\Http\Repositories;

interface CategoryRepositoryInterface
{
    public function getAllCategories();
    public function getCategoryById($id);
    public function createCategory(array $data);
    public function updateCategory(array $data, $id);
    public function deleteCategory($id);
}
