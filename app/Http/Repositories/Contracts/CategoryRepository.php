<?php

namespace App\Http\Repositories\Contracts;

interface CategoryRepository
{
    public function getAllCategories();
    public function getCategoryById($id);
    public function createCategory(array $data);
    public function updateCategory($id, array $data);
    public function deleteCategory($id);
    public function addMaterial($categoryId, array $materialData);
    public function getAllCategoriesWithMaterials();
}