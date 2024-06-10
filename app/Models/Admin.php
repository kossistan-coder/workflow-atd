<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $guard = 'admin';

    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'email',
        'password',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class,'admin_roles', 'admin_id', 'role_id');
    }

    public function hasRole($role)
    {
        return $this->roles()->contains('id', $role);
    }
}
