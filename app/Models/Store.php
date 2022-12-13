<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    public function scopeOwned($query)
    {
        return $query->ownedBy(auth()->user());
    }

    public function scopeOwnedBy($query, User $user)
    {
        return $query->where('created_by', $user->id);
    }

    public function itemCategories()
    {
        return $this->hasMany(ItemCategory::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function modifiers()
    {
        return $this->hasMany(Modifier::class);
    }
}
