<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPostProduct extends Model
{
    use HasFactory;

    protected $table = 'blog_post_product';


    protected $fillable = [
        'blog_post_id',
        'product_id',
    ];
}
