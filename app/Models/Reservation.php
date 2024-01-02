<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function voiture()
    {
        return $this->belongsTo(Voiture::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reservationAccessoires()
    {
        return $this->hasMany(ReservationAccessoire::class);
    }

    protected $fillable = [
        'user_id',
        'voiture_id',
        'date_debut',
        'date_fin',
        'total',
        'état',
        'payement',
        'retour',
    ];

}
