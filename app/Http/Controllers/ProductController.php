<?php

namespace App\Http\Controllers;

use App\Models\File;
use Inertia\Inertia;
use App\Models\Product;
use App\Models\ProductRating;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Slide;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function index(Request $request){

        if ($request->search){
            $products = Product::where('title', 'like', "%{$request->search}%")->with(['category','sub_category','sub_sub_categories', 'images'])->paginate();
        } else {
            $products = Product::with(['category','sub_category','sub_sub_categories', 'images'])->paginate();
        }

        if ($request->boolean('deleted') === true) {
            if ($request->search){
                $products = Product::onlyTrashed()->where('title', 'like', "%{$request->search}%")->with(['category','sub_category','sub_sub_categories'])->paginate();
            } else {
                $products = Product::onlyTrashed()->with(['category','sub_category','sub_sub_categories'])->paginate();
            }
        }

        $filters = $request->search ? ['search' => $request->search] : ['search' => ''];

        return Inertia::render('Admin/Products', [
            'products' => $products,
            'links' => $products->links(),
            'filters' => $filters,
        ]);

    }

    public function search(Request $request) {

        if ($request->searchCategory != '') {
            $searchPreviewProducts = Product::where('title', 'like', "%{$request->search}%")->where('category_id', '=', $request->searchCategory)->with(['category','sub_category','sub_sub_categories'])->where('enabled', '=', 1)->get()->take(4);
            $searchCategoryName = Category::where('id', '=', $request->searchCategory)->get()->pluck('title');
            $resultsCount =  Product::where('title', 'like', "%{$request->search}%")->orWhere('product_code', 'like', "%{$request->search}%")->where('category_id', '=', $request->searchCategory)->where('enabled', '=', 1)->count();
        } else {
            $searchPreviewProducts = Product::where('title', 'like', "%{$request->search}%")->orWhere('product_code', 'like', "%{$request->search}%")->with(['category','sub_category','sub_sub_categories'])->get()->where('enabled', '=', 1)->take(4);
            $results =  Product::where('title', 'like', "%{$request->search}%")->orWhere('product_code', 'like', "%{$request->search}%")->where('enabled', '=', 1)->get();
            $resultsCount =  $results->count();
            $searchCategoryName = [''];
        }

        return [
            'searchPreviewProducts' => $searchPreviewProducts,
            'searchCategoryName' => $searchCategoryName[0],
            'results' => $results,
            'resultsCount' => $resultsCount
        ];

    }

    public function filter(Request $request) {

        $products = Product::where('category_id', '=', $request->filterCategory)->with(['category','sub_category','sub_sub_categories'])->where('enabled', '=', 1)->get();

        if ($request->filterSubCategories) {

            $CatIds = [];
            
            foreach ($request->filterSubCategories as $SubCategoryName) {
               $SubCategory = SubCategory::where('title', '=', $SubCategoryName)->pluck('id');  
               array_push($CatIds, $SubCategory[0]);
            }

            $products = $products->whereIn('sub_category_id', $CatIds)->values();
        
        }

        if ($request->filterSubSubCategories) {

            $CatIds = [];
            
            foreach ($request->filterSubSubCategories as $SubSubCategoryName) {
               $SubSubCategory = SubSubCategory::where('title', '=', $SubSubCategoryName)->pluck('id');  
               array_push($CatIds, $SubSubCategory[0]);
            }


            $products = Product::whereHas('sub_sub_categories', function($q) use ($CatIds) {
                $q->whereIn('sub_sub_category_id', $CatIds);
            })->where('enabled', '=', 1)->get();
        
        }
        
        if ($request->filterMinPrice) {
            $products = $products->where('sell_price', '>', $request->filterMinPrice)->values();
        }

        if ($request->filterMaxPrice) {
             $products = $products->where('sell_price', '<', $request->filterMaxPrice)->values();
         }

        return [
            'products' => $products
        ];
    
    }

    public function searchResults(Request $request) {

        $slides = Slide::query()->where('enabled', '=', 1)->orderBy('sort_order')->get();

        if ($request->searchCategory != '') {
            $products = Product::where('title', 'like', "%{$request->search}%")->where('category_id', '=', $request->searchCategory)->with(['category','sub_category','sub_sub_categories'])->where('enabled', '=', 1)->get();
            $searchCategoryName = Category::where('id', '=', $request->searchCategory)->get()->pluck('title');
        } else {
            $products = Product::where('title', 'like', "%{$request->search}%")->with(['category','sub_category','sub_sub_categories'])->where('enabled', '=', 1)->get();
            $searchCategoryName = [''];
        }
        
        return Inertia::render('SearchResults', [
            'slides' => $slides,
            'products' => $products,
            'searchCategoryName' => $searchCategoryName[0],
            'searchTerm' => $request->search
        ]);

    }

    public function searchResultsFilter(Request $request) {

        $products = Product::where('title', 'like', "%{$request->searchTerm}%")->with(['category','sub_category','sub_sub_categories'])->where('enabled', '=', 1)->get();

        if ($request->filterCategories) {
              
            $CatIds = [];
            
            foreach ($request->filterCategories as $CategoryName) {
                $Category = Category::where('title', '=', $CategoryName)->pluck('id');  
                array_push($CatIds, $Category[0]);
            }

            $products = $products->whereIn('category_id', $CatIds)->values();
            
        }

        if ($request->filterSubCategories) {
              
            $CatIds = [];
            
            foreach ($request->filterSubCategories as $SubCategoryName) {
                $SubCategory = SubCategory::where('title', '=', $SubCategoryName)->pluck('id');  
                array_push($CatIds, $SubCategory[0]);
            }

            $products = $products->whereIn('sub_category_id', $CatIds)->values();
            
        }

        if ($request->filterSubSubCategories) {

            $CatIds = [];
            
            foreach ($request->filterSubSubCategories as $SubSubCategoryName) {
               $SubSubCategory = SubSubCategory::where('title', '=', $SubSubCategoryName)->pluck('id');  
               array_push($CatIds, $SubSubCategory[0]);
            }


            $products = Product::where('title', 'like', "%{$request->searchTerm}%")->whereHas('sub_sub_categories', function($q) use ($CatIds) {
                $q->whereIn('sub_sub_category_id', $CatIds);
            })->where('enabled', '=', 1)->get();
        
        }
           
        if ($request->filterMinPrice) {
            $products = $products->where('sell_price', '>', $request->filterMinPrice)->values();
        }

        if ($request->filterMaxPrice) {
             $products = $products->where('sell_price', '<', $request->filterMaxPrice)->values();
         }

        return [
            'products' => $products
        ];

    }

    public function import(Request $request) {   

        Excel::import(new ProductsImport, $request->file('file')->store('temp'));

        return redirect()->route('products.index')->with('message', 'Products Imported Successfully');

    }

    public function store(Product $product, Request $request) {

        $request->validate([
            'title' => 'required',
            'brand' => 'required',
            'product_code' => 'required',
            'long_desc' => 'required',
            'buy_price' => 'required',
            'sell_price' => 'required',
            'category_id' => 'required',
        ],
        [
            'title.required' => 'Please enter a Product Name',
            'brand.required' => 'Please enter a Brand',
            'product_code.required' => 'Please enter a Product Code',
            'long_desc.required' => 'Please enter a Product Description',
            'buy_price.required' => 'Please enter a Buy For Price',
            'sell_price.required' => 'Please enter a Sell For Price',
            'category.required' => 'Please select a Category',
        ]);

        $newProduct = Product::create([
            'title' => $request->title,
            'brand' => $request->brand,
            'slug' => str($request->title)->slug(),
            'product_code' => $request->product_code,
            'short_desc' => substr($request->long_desc, 0, 100),
            'long_desc' => $request->long_desc,
            'key_features' => $request->key_features,
            'buy_price' => $request->buy_price,
            'sell_price' => $request->sell_price,
            'sale_price' => $request->sale_price,
            'in_store_price' => $request->in_store_price,
            'weight' => $request->weight,
            'height' => $request->height,
            'length' => $request->length,
            'width' => $request->width,
            'enabled' => $request->enabled,
            'hot_deal' => $request->hot_deal,
            'featured' => $request->featured,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'stock' => $request->stock,
            'pack_size' => $request->pack_size,  
            'pack_product' => $request->pack_product,           
        ]);

        if ($request->sub_sub_categories) {
            foreach($request->sub_sub_categories as $subSubCat){
                
                $subSubCategory = SubSubCategory::where('id', '=', $subSubCat)->first();
               if ($subSubCategory) {
                $newProduct->sub_sub_categories()->attach($subSubCategory->id);  
               }  
            }
            sleep(0.1);
        }

        if ($request->images){
            foreach ($request->images as $newImage) {
                $imageName = $newProduct->slug.rand(1, 9999).'.jpg';

                $image = $newImage->storeAs('products/images',$imageName,'public');

                File::create([
                    'disk' => 'public',
                    'fileable_type' => 'App\Models\Product',
                    'fileable_id' => $newProduct->id,
                    'url' => Storage::disk('public')->url('products/images/' . $imageName),
                    'path' => 'products/images/' . $imageName,
                    'original_file_name' => $imageName,
                    'size' => Storage::disk('public')->size('products/images/' . $imageName),
                    'mime_type' => Storage::disk('public')->mimeType('products/images/' . $imageName),
                ]);
            }
        }

        return redirect()->route('products.index')->with('message', 'Product Added Successfully');

    }

    public function update(Product $product, Request $request) {

        $request->validate([
            'title' => 'required',
            'brand' => 'required',
            'product_code' => 'required',
            'long_desc' => 'required',
            'buy_price' => 'required',
            'sell_price' => 'required',
            'category_id' => 'required',
        ],
        [
            'title.required' => 'Please enter a Product Name',
            'brand.required' => 'Please enter a Brand',
            'product_code.required' => 'Please enter a Product Code',
            'long_desc.required' => 'Please enter a Product Description',
            'buy_price.required' => 'Please enter a Buy For Price',
            'sell_price.required' => 'Please enter a Sell For Price',
            'category.required' => 'Please select a Category',
        ]);

        $product->update([
            'title' => $request->title,
            'brand' => $request->brand,
            'slug' => str($request->title)->slug(),
            'product_code' => $request->product_code,
            'short_desc' => substr($request->long_desc, 0, 100),
            'long_desc' => $request->long_desc,
            'key_features' => $request->key_features,
            'buy_price' => $request->buy_price,
            'sell_price' => $request->sell_price,
            'sale_price' => $request->sale_price,
            'in_store_price' => $request->in_store_price,
            'weight' => $request->weight,
            'height' => $request->height,
            'length' => $request->length,
            'width' => $request->width,
            'enabled' => $request->enabled,
            'hot_deal' => $request->hot_deal,
            'featured' => $request->featured,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'stock' => $request->stock,
            'pack_size' => $request->pack_size,  
            'pack_product' => $request->pack_product,            
        ]);

        if ($request->sub_sub_categories) {
            $product->sub_sub_categories()->detach();
            foreach($request->sub_sub_categories as $subSubCat){
                
                $subSubCategory = SubSubCategory::where('id', '=', $subSubCat)->first();
               if ($subSubCategory) {
                $product->sub_sub_categories()->attach($subSubCategory->id);  
               }  
            }
            sleep(0.1);
        }

        if ($request->uploadImages && $request->images){
            $product->images()->delete();
            foreach ($request->images as $newImage) {
                $imageName = $product->slug.rand(1, 9999).'.jpg';

                $image = $newImage->storeAs('products/images',$imageName,'public');

                File::create([
                    'disk' => 'public',
                    'fileable_type' => 'App\Models\Product',
                    'fileable_id' => $product->id,
                    'url' => Storage::disk('public')->url('products/images/' . $imageName),
                    'path' => 'products/images/' . $imageName,
                    'original_file_name' => $imageName,
                    'size' => Storage::disk('public')->size('products/images/' . $imageName),
                    'mime_type' => Storage::disk('public')->mimeType('products/images/' . $imageName),
                ]);
            }
        }

       return redirect()->route('products.index')->with('message', 'Product Updated Successfully');

    }

    public function updateStatus($productId) {

        $product = Product::find($productId);
        $product->enabled = !$product->enabled;
        $product->save();

        return redirect()->route('products.index')->with('message', 'Product Status Updated Successfully');

    }

    public function delete(Product $product) {

        $product->delete();

        return redirect()->route('products.index')->with('message', 'Product Deleted Successfully');

    }

    public function restore($productId) {

        Product::onlyTrashed()->where('id', '=', $productId)->restore();

        return redirect()->route('products.index')->with('message', 'Product Restored Successfully');
    
    }

    public function forceDelete($productId)
    {

        $product = Product::onlyTrashed()->find($productId);

        $product->images()->forceDelete();
    
        $product->forceDelete();

        return redirect()->route('products.index')->with('message', 'Product Destroyed Successfully');

    }

   
     public function view($productSlug) {

        $product = Product::where('slug', '=', $productSlug)->where('enabled', '=', 1)->first();

        if ($product === null) {
            abort(404);
        }

       $related_products = Product::where('category_id', '=', $product->category_id)->inRandomOrder()->get()->take(4);

        return Inertia::render('Product', [
            'product' => $product,
            'related_products' => $related_products
        ]);

    }

    public function updateRating(Product $product, Request $request){
        
        $rating = ProductRating::where('product_id', '=', $product->id)->where('user_id', '=', Auth::user()->id)->updateOrCreate([
            'product_id' => $request->id,
            'user_id' => Auth::user()->id
        ], [
            'rating' => $request->rating
        ]);

        return redirect()->back()->with('message', 'Product Rated Successfully');

    }

    public function addToWishlist(Product $product, Request $request){

        $wishlist = Wishlist::where('product_id', '=', $product->id)->where('user_id', '=', Auth::user()->id)->updateOrCreate([
            'product_id' => $request->id,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->back()->with('message', 'Product Added to Wishlist Successfully');

    }

    public function removeFromWishlist($wishlistId) {

        $wishlist = Wishlist::find($wishlistId);
        $wishlist->delete();

        return redirect()->back()->with('message', 'Product Removed from Wishlist Successfully');

    }

    public function moveToCart($wishlistId) {

        $wishlist = Wishlist::find($wishlistId);

        $product = Product::findOrFail($wishlist->product_id);

        $cart = session()->get('cart', []);

        if (isset($cart[$wishlist->product_id])){
            $cart[$wishlist->product_id]['quantity']++;
            
        } else {
            $cart[$wishlist->product_id] = [
               'id' => $product->id,
               'title' => $product->title,
               'slug' => $product->slug,
               'quantity' => $wishlist->quantity,
               'price' => $product->sell_price,
               'image' => $product->images[0], 
            ];
        }
        
        session()->put('cart', $cart);

        $wishlist->delete();

       return redirect()->back()->with('message', 'Product Added To Cart Successfully');
       
    }
}
