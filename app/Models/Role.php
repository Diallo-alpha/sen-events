<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'guard_name',
    ];

    /**
     * The users that belong to the role.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'model_has_roles', 'role_id', 'model_id');
    }

    /**
     * The organisme that belong to the role.
     */
    public function organisme()
    {
        return $this->belongsToMany(Organisme::class, 'model_has_roles', 'role_id', 'model_id');
    }

    /**
     * The admins that belong to the role.
     */
    public function admins()
    {
        return $this->belongsToMany(Admin::class, 'model_has_roles', 'role_id', 'model_id');
    }

    /**
     * The permissions that belong to the role.
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_has_permissions');
    }
}
