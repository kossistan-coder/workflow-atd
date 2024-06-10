<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminRole extends Model
{
    use HasFactory;

    protected  $fillable = [
        'role_id',
        'admin_id',
    ];
//
//    public function roles(){
//        return $this->belongsToMany(Role::class);
//    }
//
//    public function hasRole($roles){
//        return $this->roles()->where('role_id',$roles)->exists();
//    }
}
