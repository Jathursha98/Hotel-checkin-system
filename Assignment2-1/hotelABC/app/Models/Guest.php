<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Guest extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'address',
        'contactNo',
        'nicNo'

    ];
    public function bookings(): HasOne
    {
        return $this->hasOne(Booking::class);
    }


}
