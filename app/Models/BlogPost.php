<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'snippet',
        'content',
        'youtube_link',
        'created_by',
        'updated_by',
        'archived_by'
    ];

    protected $with = [
        'images',
        'author',
        'products'
    ];

    protected $casts = [
        'created_at' => 'date:F d, Y',
    ];

    public function images()
    {
        return $this->morphMany(File::class, 'fileable');
    }

    public function author()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function products() {
        return $this->belongsToMany(Product::class);
    }
}
