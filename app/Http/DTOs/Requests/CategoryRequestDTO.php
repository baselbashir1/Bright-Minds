<?php

namespace App\Http\DTOs\Requests;

use App\Http\Requests\CategoryRequest;

class CategoryRequestDTO
{
    private $name;

    public function __construct(CategoryRequest $categoryRequest)
    {
        $validatedData = $categoryRequest->validated();
        $this->name = $validatedData['name'];
    }

    public function getName()
    {
        return $this->name;
    }
}
