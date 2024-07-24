<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'short_desc',
        'long_desc',
        'enabled',
        'created_by',
        'updated_by',
        'archived_by'
    ];

    protected $with = [
        'image',
        'logo',
    ];

    protected $casts = [
        'enabled' => 'boolean',
    ];

    public function image()
    {
        return $this->morphOne(File::class, 'fileable')->where('files.type', '=', null);
    }

    public function logo()
    {
        return $this->morphOne(File::class, 'fileable')->where('files.type', '=', 'logo');
    }

    public function sub_categories()
    {
        return $this->hasMany(SubCategory::class, 'category_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
}
