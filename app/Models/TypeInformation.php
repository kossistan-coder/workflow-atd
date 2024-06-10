<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'designation',
    ];

    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }
}
