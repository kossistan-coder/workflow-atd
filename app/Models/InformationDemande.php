<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationDemande extends Model
{
    use HasFactory;

    protected $fillable = [
        'demande_id',
        'type_information_id',
        'libelle',
    ];

    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }

    public function typeInformation(){
        return $this->hasOne(TypeInformation::class);
    }
}
