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
}
