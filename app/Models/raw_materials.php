<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class raw_materials extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'buy_date',
        'amount',
        'commetn',
        'active',
    ];
}
