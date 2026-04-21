<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /** @use HasFactory<\Database\Factories\RoleFactory> */
    use HasFactory, HasSlug;

    protected $table = 'roles';

    protected $fillable = ['en_name', 'ar_name', 'description'];

    protected $guarded = ['created_at', 'updated_at'];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_role');
    }
}
