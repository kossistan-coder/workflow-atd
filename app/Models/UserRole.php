<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    protected  $fillable = [
        'role_id',
        'user_id',
    ];

    public function roles(){
        return $this->belongsToMany(Role::class,'user_roles', 'user_id', 'role_id');
    }

    public function hasRole($roles){
        return $this->roles()->where('role_id',$roles)->exists();
    }
}
