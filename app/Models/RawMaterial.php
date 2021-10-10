<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawMaterial extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'buy_date',
        'amount',
        'comment',
        'user_id',
        'supplier_id',
        'stationery_type_id',
    ];

    // Un usuario puede crear muchas materias primas
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Un proveedor relacionado con una muchas materias primas
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }

    // Un tipo de materia prima relacionado con una muchas materias primas
    public function stationeryType(){
        return $this->belongsTo(StationeryType::class);
    }
}
