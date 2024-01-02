<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReservationAccessoire extends Model
{
    use HasFactory;
    use SoftDeletes;


    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function accessoire()
    {
        return $this->belongsTo(Accessoire::class);
    }

    protected $fillable = [
        'reservation_id',
        'accessoire_id',
        'quantité',
    ];


}
