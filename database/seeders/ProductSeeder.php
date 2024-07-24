<?php

namespace Database\Seeders;

use App\Models\File;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
           
        ];

        foreach ($products as $product) {
            $newProduct = Product::create([
                'id' => $product['id'],
                'title' => $product['title'],
                'product_code' => $product['product_code'],
                'slug' => str($product['title'])->slug(),
                'brand' => $product['brand'],
                'short_desc' => $product['short_desc'],
                'long_desc' => $product['long_desc'],
                'buy_price' => $product['buy_price'],
                'sell_price' => $product['sell_price'],
                'sale_price' => $product['sale_price'],
                'stock' => $product['stock'],
                'enabled' => 1,
                'hot_deal' => $product['hot_deal'],
                'featured' => $product['featured'],
                'category_id' => $product['category_id'],
                'sub_category_id' => $product['sub_category_id'],
                'created_by' => 1
            ]);

            foreach ($product['images'] as $image){
                File::create([
                    'disk' => 'public',
                    'fileable_type' => 'App\Models\Product',
                    'fileable_id' => $newProduct->id,
                    'url' => Storage::disk('public')->url('product/images/'.$product['product_code'].'/' . $image),
                    'path' => 'products/images/'.$product['product_code'].'/' . $image,
                    'original_file_name' => $image,
                    'size' => Storage::disk('public')->size('categories/images/'.$product['product_code'].'/' . $image),
                    'mime_type' => Storage::disk('public')->mimeType('categories/images/'.$product['product_code'].'/' . $image),
                ]);
            }
        }
    }
}
