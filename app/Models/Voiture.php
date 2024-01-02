<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Voiture extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    protected $fillable = [
        'model',
        'marque',
        'immatriculation',
        'année',
        'transmission',
        'type_carburant',
        'portes',
        'places',
        'bagages',
        'prix_par_jour',
        'assurance',
        'description',
        'état',
        'pénalité',
        'image_path',
    ];

}
