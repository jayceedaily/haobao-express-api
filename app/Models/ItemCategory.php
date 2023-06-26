<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::deleting(function ($itemCategory) {

            $itemCategory->items()->update([
                'category_id' => null
            ]);
        });
    }

    public function items()
    {
        return $this->hasMany(Item::class, 'category_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
