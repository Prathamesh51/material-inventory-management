<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Contracts\CategoryRepository;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $categories = $this->categoryRepository->getAllCategories();
            return view('categories.index', compact('categories'));
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        try {
            $category = $this->categoryRepository->createCategory($request->validated());
            if($category){
                return redirect()->route('categories.index')->with('success', 'Category created successfully.');    
            }
            return redirect()->route('categories.index')->with('error', 'Failed to create category.');
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        try {
            $category = $this->categoryRepository->getCategoryById($category->id);
            if($category){
                return view('categories.edit', compact('category'));
            }
            return redirect()->route('categories.index')->with('error', 'Category not found.');
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, $categoryId)
    {
        try {
            $updatedCategory = $this->categoryRepository->updateCategory($categoryId, $request->validated());
            if($updatedCategory)
            {
                return redirect()->route('categories.index')->with('success', 'Category updated successfully.');    
            }
            return redirect()->route('categories.index')->with('error', 'Failed to update category.');
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($categoryId)
    {
        try {
            $deleted = $this->categoryRepository->deleteCategory($categoryId);
            if($deleted){
                return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');    
            }
            return redirect()->route('categories.index')->with('error', 'Failed to delete category.');
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
