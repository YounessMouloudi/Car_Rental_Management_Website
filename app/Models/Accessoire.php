<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Accessoire extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function reservationAccessoires()
    {
        return $this->hasMany(ReservationAccessoire::class);
    }

    protected $fillable = [
        'name',
        'prix',
    ];

}
