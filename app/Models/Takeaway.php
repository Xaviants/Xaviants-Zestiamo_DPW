<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Takeaway extends Model
{

    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'pickup_location',
        'payment_method',
    ];
}
