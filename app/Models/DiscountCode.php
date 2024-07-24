<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiscountCode extends Model
{
   use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'type',
        'value',
        'start_date',
        'end_date',
        'enabled',
    ];

    protected $casts = [
        'enabled' => 'boolean',
    ];
}
