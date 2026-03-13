<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Contracts\CategoryRepository;
use App\Http\Repositories\Contracts\MaterialRepository;
use App\Http\Requests\MaterialRequest;
use App\Models\Material;
use Exception;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    protected $materialRepository;
    protected $categoryRepository;
    public function __construct(MaterialRepository $materialRepository, CategoryRepository $categoryRepository)
    {
        $this->materialRepository = $materialRepository;
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index($categoryId)
    {
        try {
            $materials = $this->materialRepository->getMaterialsByCategoryId($categoryId);
            $category = $this->categoryRepository->getCategoryById($categoryId);
            return view('materials.index', compact('materials', 'category'));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function getMaterials()
    {
        try {
            $materials = $this->materialRepository->getMaterialsWithInwardQuantities();
            return view('dashboard', compact('materials'));
        } catch (Exception $e) {
            throw $e;
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create($categoryId)
    {
        return view('materials.create', compact('categoryId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MaterialRequest $request)
    {
        try {
            $material = $this->materialRepository->createMaterial($request->validated());
            if($material){
                return redirect()->route('materials.index', $request->category_id)->with('success', 'Material created successfully.');
            }
            return redirect()->route('materials.index', $request->category_id)->with('error', 'Failed to create material.');
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        try {
             $material = $this->materialRepository->getMaterialById($material->id);
            if($material){
                return view('materials.show', compact('material'));
            }
            return redirect()->route('materials.index')->with('error', 'Material not found.');
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($materialId)
    {
        try {
            $material = $this->materialRepository->getMaterialById($materialId);
            if($material){
                return view('materials.edit', compact('material'));
            }
            return redirect()->route('materials.index', $material->category_id)->with('error', 'Material not found.');
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MaterialRequest $request, $materialId)
    {
        try {
            $updatedMaterial = $this->materialRepository->updateMaterial($materialId, $request->validated());

            if($updatedMaterial){
                return redirect()->back()->with('success', 'Material updated successfully.');
            }
            return redirect()->back()->with('error', 'Failed to update material.');
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($materialId)
    {
        try {
            // $material = $this->materialRepository->getMaterialById($materialId);
            $deleted = $this->materialRepository->deleteMaterial($materialId);

            if($deleted){
                return redirect()->back()->with('success', 'Material deleted successfully.');
                // return redirect()->route('materials.index', $material->category_id)->with('success', 'Material deleted successfully.');
            }
            return redirect()->back()->with('error', 'Failed to delete material.');
        } catch (Exception $e) {
            throw $e;
        }
    }
}
