<?php

namespace App\Imports;

use App\Models\File;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Storage;

class ProductsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $category = Category::where('title', '=', $row['category'])->first();
        $subCategory = SubCategory::where('title', '=', $row['sub_category'])->first();

        $subsubcategorydata = $row['sub_sub_categories'];
            
        if ($category){
            $product =  Product::create([
                'title' => $row['product'],
                'brand' => $row['brand'],
                'product_code'  => $row['product_no'],
                'slug' => str($row['product'])->slug(),
                'short_desc' => substr($row['description'], 0, 100),
                'long_desc' => $row['description'],
                'key_features' => $row['key_features'],
                'buy_price' => $row['buy_price'],
                'sell_price' => $row['sell_price'],
                'in_store_price' => $row['in_store_price'],
                'sale_price' => $row['sale_price'],
                'height' => $row['height'],
                'length' => $row['length'],
                'width' => $row['width'],
                'weight' => $row['weight'],
                'enabled' => $row['enabled'],
                'hot_deal' => $row['hot_deal'],
                'featured' => $row['featured'],
                'stock' => $row['quantity'],
                'pack_size' => $row['pack_size'],
                'pack_product' => $row['pack_product'],
                'category_id' => $category->id,
            ]);

            if ($subCategory){
               $product->sub_category_id = $subCategory->id;
               $product->save();
            }

            $var=explode(',',$subsubcategorydata);

            if ($subsubcategorydata ) {
                foreach($var as $rowSubSubCat){
                    
                    $subSubCategory = SubSubCategory::where('title', '=', $rowSubSubCat)->first();
                   // dd($subSubCategory);
                   if ($subSubCategory) {
                    $product->sub_sub_categories()->attach($subSubCategory->id);  
                   }  
                }
                sleep(0.1);
            }
            
            if(Storage::disk('public')->files('products/'.$product->product_code)) {
        
                foreach (Storage::disk('public')->files('products/'.$product->product_code) as $file) {
                    if (!str_contains($file, '.DS_Store')) {
                        File::create([
                            'disk' => 'public',
                            'fileable_type' => 'App\Models\Product',
                            'fileable_id' => $product->id,
                            'url' => Storage::disk('public')->url( $file),
                            'path' =>  $file,
                            'original_file_name' => $file,
                            'size' => Storage::disk('public')->size($file),
                            'mime_type' => Storage::disk('public')->mimeType($file),
                        ]);
                    }
                }
            }

            return $product;
        }
    }
}
