<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtivityRaw extends Model
{
    use HasFactory;

    public $fillable = [
        'total',
        'code',
        'name',
        'input_output',
        'user_id'
    ];
}
