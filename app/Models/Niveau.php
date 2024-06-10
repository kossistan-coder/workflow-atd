<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    use HasFactory;

    protected $fillable = [
        'statut_id',
        'description',
    ];

    public function  statut()
    {
        return $this->hasOne(Statut::class);
    }
}
