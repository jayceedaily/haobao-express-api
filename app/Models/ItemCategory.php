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
                'item_category' => null
            ]);
        });
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
