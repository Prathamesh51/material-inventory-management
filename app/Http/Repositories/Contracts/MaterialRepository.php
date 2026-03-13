<?php

namespace App\Http\Repositories\Contracts;

interface MaterialRepository
{
    public function getMaterialsByCategoryId($categoryId);
    public function getMaterialById($id);
    public function createMaterial(array $data);
    public function updateMaterial($id, array $data);
    public function deleteMaterial($id);
    public function getMaterialsWithInwardQuantities();
    public function updateInwardQuantities(array $data);
}
