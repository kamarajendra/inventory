<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    use HasFactory;
    protected $table= 'list_history';
    protected $fillable = [
        'model',
        'serial_number',
        'fa_pc',
        'user',
        'unit',
        'user_role',
        'status',
        'details',
        'specs',
        'unit_id'
    ];

    // public function detailItem()
    // {
    //     return $this->belongsTo(detailItems::class, 'detail_id');
    //     return $this->belongsTo(detailItems::class,'id');
    // }
    public function detail_item(): HasMany
    {
        return $this->hasMany(ListItem::class,'id','unit_id');
    }
   
}
