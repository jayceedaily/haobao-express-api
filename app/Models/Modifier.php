<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modifier extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'limit'];

    protected $casts = [
        'limit' => 'integer'
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
