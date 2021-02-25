<?php

namespace App\models;

use App\Services\CategoryService;

class CategoryModel
{
    private CategoryService $categoryService;

    public function __construct()
    {
        $this->categoryService = new CategoryService();
    }

    public function getAll()
    {
        return $this->categoryService->getAll();
    }

    public function getById(int $id)
    {
        return $this->categoryService->geById($id);
    }

    public function createCategory(string $category) : bool
    {
        return $this->categoryService->create($category);
    }

    public function updateCategory(int $id, string $category) : bool
    {
        return $this->categoryService->update($id, $category);
    }

    public function deleteCategory(int $id) : bool
    {
        return $this->categoryService->delete($id);
    }
}