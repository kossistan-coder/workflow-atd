<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model

{
    use HasFactory;

    protected $fillable = [
        'designation',
        'niveau',
        'description',
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function admins(){
        return $this->belongsToMany(Admin::class,'admin_roles', 'role_id', 'admin_id');
    }


}
