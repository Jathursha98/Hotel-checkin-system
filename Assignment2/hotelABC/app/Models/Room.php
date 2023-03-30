<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable =[
        'suiteType',
        'roomNo',
        'status'
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }


}
