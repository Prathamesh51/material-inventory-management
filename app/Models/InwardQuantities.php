<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class InwardQuantities extends Model
{
    use HasUlids;

    protected $table = 'inward_quantities';

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'category_id',
        'material_id',
        'quantity',
        'date',
    ];

    public function material()
    {
        return $this->belongsTo(Material::class);
    }
}
