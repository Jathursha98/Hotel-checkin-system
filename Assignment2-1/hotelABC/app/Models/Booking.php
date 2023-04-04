<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Booking extends Model
{
    use HasFactory;

    protected  $fillable =[
        'guestID',
        'roomID',
        'checkIn_Date',
        'checkOut _Date',
        'stayType',
        'cost'
    ];


    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function guest(): BelongsTo
    {
        return $this->belongsTo(Guest::class);
    }

    public function checkIns(): HasOne
    {
        return $this->hasOne(CheckIn::class);
    }
}
