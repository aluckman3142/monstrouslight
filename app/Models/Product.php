<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
   use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'brand',
        'product_code',
        'slug',
        'short_desc',
        'long_desc',
        'key_features',
        'buy_price',
        'sell_price',
        'in_store_price',
        'sale_price',
        'height',
        'length',
        'width',
        'weight',
        'enabled',
        'hot_deal',
        'featured',
        'stock',
        'category_id',
        'sub_category_id',
        'created_by',
        'updated_by',
        'archived_by',
        'pack_size',
        'pack_product'
    ];

    protected $with = [
        'images',
        'pack',
        'ratings'
    ];

    protected $casts = [
        'enabled' => 'boolean',
        'hot_deal' => 'boolean',
        'featured' => 'boolean'
    ];

    protected $appends = [
        'isInStock',
        'rating'
       // 'StockCount'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id', 'id');
    }

    public function sub_sub_categories()
    {
        return $this->belongsToMany(SubSubCategory::class, 'product_sub_sub_category');
    }

    public function images()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function pack()
    {
        return $this->belongsTo(Product::class, 'product_code', 'pack_product');
    }

    public function getIsInStockAttribute()
    {
        if ($this->stock <= 0 && !$this->pack) {
        return false;
        } else {
            return true;
        }
    }

    // public function getStockCountAttribute()
    // {
    //     return $this->stock + ($this->pack->stock * $this->pack->pack_size);
    // }

    public function ratings()
    {
        return $this->hasMany(ProductRating::Class, 'product_id', 'id');
    }

    public function getRatingAttribute()
    {
        $ratings = ProductRating::where('product_id', '=', $this->id)->get();
        $total = 0;
        if ($ratings->count() > 0){
            foreach ($ratings as $rating){
                $total = $total + $rating->rating;
            }

            $total = $total/$ratings->count();
        }
        return $total;
    }
}
