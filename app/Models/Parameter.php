<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo_1',
        'logo_2',
        'representative', 
        'telephone',
        'email',
        'address',
        'company_nit',
        'nrc',
        'representative_nit',
        'company_type'
    ];
}
