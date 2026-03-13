<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Contracts\CategoryRepository;
use App\Http\Repositories\Contracts\MaterialRepository;
use App\Http\Requests\MaterialTransactionRequest;
use App\Models\InwardQuantities;
use Exception;
use Illuminate\Http\Request;

class InwardQuantitiesController extends Controller
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
    public function index()
    {
        try {
            $materials = $this->materialRepository->getMaterialsWithInwardQuantities();
            return view('materialTransaction.index', compact('materials'));
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $categories = $this->categoryRepository->getAllCategoriesWithMaterials();
            return view('materialTransaction.create', compact('categories'));
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MaterialTransactionRequest $request)
    {
         try {
            $updatedInwardQuantities = $this->materialRepository->updateInwardQuantities($request->validated());

            if($updatedInwardQuantities){
                return redirect()->route('inward_quantities.index')->with('success', 'Inward quantity updated successfully.');
            }
            return redirect()->back()->with('error', 'Failed to update inward quantity.');
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(InwardQuantities $inwardQuantities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InwardQuantities $inwardQuantities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InwardQuantities $inwardQuantities)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InwardQuantities $inwardQuantities)
    {
        //
    }
}
