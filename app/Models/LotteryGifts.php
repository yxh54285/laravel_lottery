<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LotteryGifts extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',  
        'name', 
        'used',
        'quantity', 
        'created_at' 
    ];
}
