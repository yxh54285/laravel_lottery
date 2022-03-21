<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lottery extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'group_id',
        'number',
        'gift_id',
        'created_at'
    ];
}
