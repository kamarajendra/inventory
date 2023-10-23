<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Peminjam extends Model
{
    use HasFactory;
    protected $table = 'list_user';
    protected $fillable = [
        'name',
        'unit',
        'role',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(ListItem::class,'id');
    }

}
