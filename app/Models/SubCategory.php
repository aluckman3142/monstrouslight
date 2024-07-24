<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'short_desc',
        'long_desc',
        'category_id',
        'created_by',
        'updated_by',
        'archived_by'
    ];

    protected $with = [
        'logo',
        'sub_sub_categories'
    ];

    protected $casts = [
        'enabled' => 'boolean',
    ];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function sub_sub_categories()
    {
        return $this->hasMany(SubSubCategory::class, 'sub_category_id', 'id');
    }

    public function logo()
    {
        return $this->morphOne(File::class, 'fileable')->where('files.type', '=', 'logo');;
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'sub_category_id', 'id');
    }
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
}
