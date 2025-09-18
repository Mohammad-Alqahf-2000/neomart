<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /** @use HasFactory<\Database\Factories\PermissionFactory> */
    use HasFactory;

    protected $table = 'permissions';

    protected $fillable = ['name', 'description'];

    protected $guarded = ['created_at', 'updated_at'];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'permission_role');
    }
}
