<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statut extends Model
{
    use HasFactory;

    protected $fillable = [
        'designation',

    ];

    public function  niveau()
    {
        return $this->belongsTo(Niveau::class);
    }

    public function demandes(){
        return $this->hasMany(Demande::class);
    }
}
