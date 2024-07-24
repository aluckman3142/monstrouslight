<?php

namespace App\Http\Controllers;

use App\Models\File;
use Inertia\Inertia;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function index(Request $request){

        if ($request->search){
            $categories = Category::where('title', 'like', "%{$request->search}%")->with('sub_categories')->get();
        } else {
            $categories = Category::with('sub_categories')->get();
        }

        if ($request->boolean('deleted') === true) {
            if ($request->search){
                $categories = Category::onlyTrashed()->where('title', 'like', "%{$request->search}%")->with('sub_categories')->get();
            } else {
                $categories = Category::onlyTrashed()->with('sub_categories')->get();
            }
        }


        $filters = $request->search ? ['search' => $request->search] : ['search' => ''];

        return Inertia::render('Admin/Categories', [
            'categories' => $categories,
            'filters' => $filters,
        ]);
    }

    public function store(Category $category, Request $request) {

        $request->validate([
            'title' => 'required',
            'short_desc' => 'required',
            'long_desc' => 'required',
        ],
        [
            'title.required' => 'Please enter a Category Name',
            'short_desc.required' => 'Please enter a Short Description',
            'long_desc.required' => 'Please enter a Long Description'
        ]);

        $newCategory = Category::create([
            'title' => $request->title,
            'slug' => str($request->title)->slug(),
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
        ]);

        if ($request->image){

            $imageName = $newCategory->slug.'.jpg';

            $image = $request->image->storeAs('categories/images',$imageName,'public');

             File::create([
                'disk' => 'public',
                'fileable_type' => 'App\Models\Category',
                'fileable_id' => $newCategory->id,
                'url' => Storage::disk('public')->url('categories/images/' . $imageName),
                'path' => 'categories/images/' . $imageName,
                'original_file_name' => $imageName,
                'size' => Storage::disk('public')->size('categories/images/' . $imageName),
                'mime_type' => Storage::disk('public')->mimeType('categories/images/' . $imageName),
            ]);
        }

        if ($request->logo){

            $imageName = $newCategory->slug.'.png';

            $logo = $request->logo->storeAs('categories/logos',$imageName,'public');

             File::create([
                'disk' => 'public',
                'fileable_type' => 'App\Models\Category',
                'fileable_id' => $newCategory->id,
                'type' => 'logo',
                'url' => Storage::disk('public')->url('categories/logos/' . $imageName),
                'path' => 'categories/logos/' . $imageName,
                'original_file_name' => $imageName,
                'size' => Storage::disk('public')->size('categories/logos/' . $imageName),
                'mime_type' => Storage::disk('public')->mimeType('categories/logos/' . $imageName),
            ]);
        }

        return redirect()->route('categories.index')->with('message', 'Category Added Successfully');

    }

    public function update(Category $category, Request $request) {

        $request->validate([
            'title' => 'required',
            'short_desc' => 'required',
            'long_desc' => 'required',
        ],
        [
            'title.required' => 'Please enter a Category Name',
            'short_desc.required' => 'Please enter a Short Description',
            'long_desc.required' => 'Please enter a Long Description'
        ]);

        $category->update([
            'title' => $request->title,
            'slug' => str($request->title)->slug(),
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
        ]);

        if ($request->image){

            $category->image->delete();

            $imageName = $category->slug.'.jpg';

            $image = $request->image->storeAs('categories/images/',$imageName,'public');

             File::create([
                'disk' => 'public',
                'fileable_type' => 'App\Models\Category',
                'fileable_id' => $category->id,
                'url' => Storage::disk('public')->url('categories/images/' . $imageName),
                'path' => 'categories/images/' . $imageName,
                'original_file_name' => $imageName,
                'size' => Storage::disk('public')->size('categories/images/' . $imageName),
                'mime_type' => Storage::disk('public')->mimeType('categories/images/' . $imageName),
            ]);
        }

        if ($request->logo){

            $category->logo->delete();

            $imageName = $category->slug.'.png';

            $logo = $request->logo->storeAs('categories/logos/',$imageName,'public');

             File::create([
                'disk' => 'public',
                'fileable_type' => 'App\Models\Category',
                'fileable_id' => $category->id,
                'type' => 'logo',
                'url' => Storage::disk('public')->url('categories/logos/' . $imageName),
                'path' => 'categories/logos/' . $imageName,
                'original_file_name' => $imageName,
                'size' => Storage::disk('public')->size('categories/logos/' . $imageName),
                'mime_type' => Storage::disk('public')->mimeType('categories/logos/' . $imageName),
            ]);
        }

       return redirect()->route('categories.index')->with('message', 'Category Updated Successfully');

    }

    public function updateStatus($categoryId) {
        $category = Category::find($categoryId);

        $category->enabled = !$category->enabled;

        $category->save();

        return redirect()->route('categories.index')->with('message', 'Category Status Updated Successfully');
    }

    public function delete(Category $category) {
        $category->delete();

        return redirect()->route('categories.index')->with('message', 'Category Deleted Successfully');
    }

    public function restore($categoryId) {
        Category::onlyTrashed()->where('id', '=', $categoryId)->restore();

        return redirect()->route('categories.index')->with('message', 'Category Restored Successfully');
    }

    public function forceDelete($categoryId)
    {
        $category = Category::onlyTrashed()->find($categoryId);

        foreach ($category->sub_categories as $sub_category){
            $sub_category->sub_sub_categories()->forceDelete();
        }
        $category->sub_categories()->forceDelete();

        $category->image()->forceDelete();
        $category->logo()->forceDelete();

        $category->forceDelete();

        return redirect()->route('categories.index')->with('message', 'Category Destroyed Successfully');
    }

    
    public function viewSubSub($categorySlug, $subCategorySlug, $subSubCategorySlug) {
        $category = Category::where('slug', '=', $categorySlug)->first();
        $subCategory = SubCategory::where('slug', '=', $subCategorySlug)->first();
        $subSubCategory = SubSubCategory::where('slug', '=', $subSubCategorySlug)->first();

        if ($category === null || $subCategory === null || $subSubCategory === null) {
           abort(404);
           }

           $products = Product::where('category_id', '=', $category->id)->where('sub_category_id', '=', $subCategory->id)->whereHas('sub_sub_categories', function($q) use ($subSubCategory) {
                $q->where('sub_sub_category_id', '=', $subSubCategory ->id);
            })->where('enabled', '=', 1)->get();

        return Inertia::render('Category', [
            'category' => $category,
            'subCategory' => $subCategory,
            'subSubCategory' => $subSubCategory,
            'products' => $products,
        ]);

    }

    public function viewSub($categorySlug, $subCategorySlug) {
       $category = Category::where('slug', '=', $categorySlug)->first();
        $subCategory = SubCategory::where('slug', '=', $subCategorySlug)->first();

        if ($category === null || $subCategory === null) {
            abort(404);
        }

        $products = Product::where('category_id', '=', $category->id)->where('sub_category_id', '=', $subCategory->id)->where('enabled', '=', 1)->get();

        return Inertia::render('Category', [
            'category' => $category,
            'subCategory' => $subCategory,
            'products' => $products,
        ]);

    }

     public function view($categorySlug) {
       $category = Category::where('slug', '=', $categorySlug)->with('sub_categories')->with('sub_categories.sub_sub_categories')->first();

       if ($category === null) {
        abort(404);
       }

       $products = Product::where('category_id', '=', $category->id)->where('enabled', '=', 1)->get();

        return Inertia::render('Category', [
            'category' => $category,
            'products' => $products,
        ]);

    }

    public function getSubCategories(Request $request){
       $categories = Category::whereIn('title', $request->categories)->pluck('id');

       $subCategories = SubCategory::whereIn('category_id', $categories)->get();

       return [
        'subCategories' => $subCategories
        ];
    }

    public function getSubSubCategories(Request $request){
        $subCategories = SubCategory::whereIn('title', $request->subCategories)->pluck('id');
 
        $subSubCategories = SubSubCategory::whereIn('sub_category_id', $subCategories)->get();
 
        return [
         'subSubCategories' => $subSubCategories
         ];
     }
}
