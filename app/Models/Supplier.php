<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'nrc',
        'nit',
        'company_type',
        'business',
        'telephone',
        'email',
        'active',
    ];

    // Un proveedor relacionado con una muchas materias primas
    public function rawMaterials(){
        return $this->belongsTo(RawMaterials::class);
    }
}
