<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'cost', 'stock', 'low_stock_threshold',
        'track_stock', 'parent_id', 'category_id'
    ];

    protected $casts = [
        'price' => 'integer',
        'cost' => 'integer',
        'stock' => 'integer',
        'low_stock_threshold' => 'boolean',
        'track_stock' => 'boolean',
        'sell' => 'boolean',
    ];

    // protected function price(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => $value / 100,
    //     );
    // }

    public function modifiers()
    {
        return $this->belongsToMany(Modifier::class);
    }

    public function category()
    {
        return $this->belongsTo(ItemCategory::class);
    }
}
