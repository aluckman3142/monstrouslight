<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slide extends Model
{
   use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'text',
        'button_text',
        'button_path',
        'sort_order',
        'enabled',
        'created_by',
        'updated_by',
        'archived_by',
    ];

    protected $with = [
        'image',
        'logo',
        'product'
    ];

    protected $casts = [
        'enabled' => 'boolean',
    ];

    public function image()
    {
        return $this->morphOne(File::class, 'fileable');
    }

    public function logo()
    {
        return $this->morphOne(File::class, 'fileable')->where('files.type', '=', 'logo');;
    }

    public function product()
    {
        return $this->morphOne(File::class, 'fileable')->where('files.type', '=', 'product');;
    }
}
