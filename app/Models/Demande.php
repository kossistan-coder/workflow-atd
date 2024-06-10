<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande extends Model
{
    use HasFactory;

    protected $fillable = [
        'objet',
        'description',
        'statut_id',
        'user_id',
    ];

    public function informations()
    {
        return $this->hasMany(InformationDemande::class);
    }

    public  function user(){
        return $this->belongsTo(User::class);
    }

    public function statut(){
        return $this->belongsTo(Statut::class);
    }
}
