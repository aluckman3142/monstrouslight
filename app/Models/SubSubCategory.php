<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubSubCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'short_desc',
        'long_desc',
        'sub_category_id',
        'created_by',
        'updated_by',
        'archived_by'
    ];

    protected $with = [

    ];

    protected $casts = [
        'enabled' => 'boolean',
    ];

    public function sub_category() {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_sub_sub_category');
    }

    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }
}
