<?php

namespace App\Http\Repositories\Eloquent;

use App\Http\Repositories\Contracts\CategoryRepository;
use App\Models\Category;

class EloquentCategoryRepository implements CategoryRepository
{
    protected $modelCategory;
    /**
     * Create a new class instance.
     */
    public function __construct(Category $modelCategory)
    {
        $this->modelCategory = $modelCategory;
    }

    public function getAllCategories()
    {
        // to retrieve all categories
        $categories = $this->modelCategory->all();
        if($categories->isEmpty()){
            return [];
        }
        return $categories;
    }

    public function getCategoryById($id)
    {
        // to retrieve a category by its ID
        return $this->modelCategory->find($id);
    }

    public function createCategory(array $data)
    {
        // to create a new category
        $category = $this->modelCategory;
        $category->fill($data);
        $category->save();
        return $category;
    }

    public function updateCategory($id, array $data)
    {
        // to update an existing category
        $category = $this->getCategoryById($id);
        if($category){
            $category->fill($data);
            $category->save();
        }
        return $category;
    }

    public function deleteCategory($id)
    {
        // to delete a category
        $category = $this->getCategoryById($id);
        if(!$category){
            return false;
        }
        if($category->materials()->count() > 0){
            $category->materials()->delete();
            return $category->delete();
        }
        return $category->delete();
    }

    public function addMaterial($categoryId, array $materialData)
    {
        // to add a material to a category
        $category = $this->getCategoryById($categoryId);
        if($category){
            return $category->materials()->create($materialData);
        }
        return false;
    }

    public function getAllCategoriesWithMaterials()
    {
        // to retrieve all categories along with their materials
        return $this->modelCategory->with('materials')->get();  
    }
}
