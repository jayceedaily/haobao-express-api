<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'level'];

    protected $hidden = ['pivot'];

    protected $casts = ['default' => 'bool'];

    public const SUPERUSER_LEVEL = 0;

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, RolePermission::class);
    }

    public function scopeVisibleToUser($query, User $user)
    {
        return $query->where('level', '>=', $user->role->level);
    }

    public static function default()
    {
        return self::where('default', true)->first();
    }
}
