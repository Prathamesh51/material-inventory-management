<?php

namespace App\Http\Repositories\Eloquent;

use App\Http\Repositories\Contracts\MaterialRepository;
use App\Models\InwardQuantities;
use App\Models\Material;

class EloquentMaterialRepository implements MaterialRepository
{
    protected $modelMaterial;
    /**
     * Create a new class instance.
     */
    public function __construct(Material $modelMaterial)
    {
        $this->modelMaterial = $modelMaterial;
    }

    public function getMaterialsByCategoryId($categoryId)
    {
        // to retrieve all materials for a specific category
        return $this->modelMaterial
            ->where('category_id', $categoryId)
            ->get();
    }

    public function getMaterialById($id)
    {
        // to retrieve a material by its ID
        return $this->modelMaterial->find($id);
    }

    public function createMaterial(array $data)
    {
        // to create a new material
        return $this->modelMaterial->create($data);
    }

    public function updateMaterial($id, array $data)
    {
        // to update an existing material
        $material = $this->getMaterialById($id);
        if($material){
            $material->update($data);
        }
        return $material;
    }

    public function deleteMaterial($id)
    {
        // to delete a material
        $material = $this->getMaterialById($id);
        if($material){
            $material->delete();
        }
        return $material;
    }   

    public function getMaterialsWithInwardQuantities()
    {
        // to retrieve materials along with their inward quantities
        $materials = $this->modelMaterial->with('category', 'transactions')
        ->get()
        ->map(function ($material) {
            $material->current_balance = $material->opening_balance + $material->transactions->sum('quantity');
            return $material;
        });

        return $materials;
    }

    public function updateInwardQuantities(array $data)
    {
        // to update the inward quantities for a material
        $material = $this->getMaterialById($data['material_id']);
        if($material){
            InwardQuantities::create([
                'category_id' => $data['category_id'],
                'material_id' => $data['material_id'],
                'quantity' => $data['quantity'],
                'date' => $data['date'],
            ]);
            return true;
        }

        return false;
    }
}
