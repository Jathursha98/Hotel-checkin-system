<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CheckIn extends Model
{
    use HasFactory;

    protected $fillable =[
        'bookingID',
        'checkIn_Date_Time',
        'checkOut_Date_Time',
        'totalDays',

    ];

    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class);
    }

    public function payments(): HasOne
    {
        return $this->hasOne(Payment::class);
    }
}
