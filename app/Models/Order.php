<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'billing_email',
        'billing_name',
        'address_line_1',
        'address_line_2',
        'city',
        'county',
        'postcode',
        'name_on_card',
        'discount',
        'tax',
        'total',
        'payment_gateway',
        'shipped',
        'status',
        'type',
        'error',
        'created_by'
    ];

    protected $casts = [
        'created_at' => 'date:D, M d, Y',
    ];

    protected $with = [
        'products'
    ];

    public function user() {
        return $this->belongs(User::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
}
