<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'model',
        'serial_number',
        'fa_pc',
        'user',
        'unit',
        'user_role',
        'status',
        'details',
        'specs'
    ];
}
