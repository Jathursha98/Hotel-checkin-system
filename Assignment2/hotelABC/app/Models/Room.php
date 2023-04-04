<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    use HasFactory;

    protected $fillable =[
        'suite_type',
        'room_no',
        'status'
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }


}
