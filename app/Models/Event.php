<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'date',
        'title',
        'description',
        'start_time',
        'price',
        'end_time',
        'enabled',
    ];

    protected $with = [
        'image',
    ];

    protected $casts = [
        'enabled' => 'boolean',
    ];

    public function image()
    {
        return $this->morphOne(File::class, 'fileable')->where('files.type', '=', null);
    }
}
