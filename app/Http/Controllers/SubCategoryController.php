<?php

namespace App\Http\Controllers;

use App\Models\File;
use Inertia\Inertia;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubCategoryController extends Controller
{

    public function index(Request $request){

        if ($request->search){
            $subCategories = SubCategory::where('title', 'like', "%{$request->search}%")->orWhereHas('category', function ($q) use ($request) {
                $q->where('title', 'like', "%{$request->search}%"); // or email <> ''
            })->with('category', 'sub_sub_categories')->get();
        } else {
            $subCategories = SubCategory::with('category', 'sub_sub_categories')->get();
        }

        if ($request->boolean('deleted') === true) {
            if ($request->search){
                $subCategories = SubCategory::onlyTrashed()->with('category', 'sub_sub_categories')->where('title', 'like', "%{$request->search}%")->get();
            } else {
                $subCategories = SubCategory::onlyTrashed()->with('category', 'sub_sub_categories')->get();
            }
        }


        $filters = $request->search ? ['search' => $request->search] : ['search' => ''];

        return Inertia::render('Admin/SubCategories', [
            'subCategories' => $subCategories,
            'filters' => $filters,
        ]);
    }

    public function store(SubCategory $subCategory, Request $request) {

        $request->validate([
            'title' => 'required',
            'short_desc' => 'required',
            'long_desc' => 'required',
            'category_id' => 'required',
        ],
        [
            'title.required' => 'Please enter a Sub Category Name',
            'short_desc.required' => 'Please enter a Short Description',
            'long_desc.required' => 'Please enter a Long Description',
            'category_id.required' => 'Please select a Parent Category '
        ]);

        $newSubCategory = SubCategory::create([
            'title' => $request->title,
            'slug' => str($request->title)->slug(),
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'category_id' => $request->category_id
        ]);

        if ($request->logo){

            $imageName = $newSubCategory->slug.'.png';

            $logo = $request->logo->storeAs('categories/logos',$imageName,'public');

             File::create([
                'disk' => 'public',
                'fileable_type' => 'App\Models\SubCategory',
                'fileable_id' => $newCategory->id,
                'type' => 'logo',
                'url' => Storage::disk('public')->url('categories/logos/' . $imageName),
                'path' => 'categories/logos/' . $imageName,
                'original_file_name' => $imageName,
                'size' => Storage::disk('public')->size('categories/logos/' . $imageName),
                'mime_type' => Storage::disk('public')->mimeType('categories/logos/' . $imageName),
            ]);
        }

        return redirect()->route('sub-categories.index')->with('message', 'Sub Category Added Successfully');

    }

    public function update(SubCategory $subCategory, Request $request) {

        $request->validate([
            'title' => 'required',
            'short_desc' => 'required',
            'long_desc' => 'required',
            'category_id' => 'required',
        ],
        [
            'title.required' => 'Please enter a Category Name',
            'short_desc.required' => 'Please enter a Short Description',
            'long_desc.required' => 'Please enter a Long Description',
            'category_id.required' => 'Please select a Parent Category '
        ]);

        $subCategory->update([
            'title' => $request->title,
            'slug' => str($request->title)->slug(),
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'category_id' => $request->category_id
        ]);

        if ($request->logo){

            $subCategory->logo->delete();

            $imageName = $category->slug.'.png';

            $logo = $request->logo->storeAs('categories/logos',$imageName,'public');

             File::create([
                'disk' => 'public',
                'fileable_type' => 'App\Models\SubCategory',
                'fileable_id' => $subCategory->id,
                'type' => 'logo',
                'url' => Storage::disk('public')->url('categories/logos/' . $imageName),
                'path' => 'categories/images/' . $imageName,
                'original_file_name' => $imageName,
                'size' => Storage::disk('public')->size('categories/logos/' . $imageName),
                'mime_type' => Storage::disk('public')->mimeType('categories/logos/' . $imageName),
            ]);
        }

       return redirect()->route('sub-categories.index')->with('message', 'Sub Category Updated Successfully');

    }

    public function updateStatus($subCategoryId) {
        $subCategory = SubCategory::find($subCategoryId);

        $subCategory->enabled = !$subCategory->enabled;

        $subCategory->save();

        return redirect()->route('sub-categories.index')->with('message', 'Sub Category Status Updated Successfully');
    }

    public function delete(SubCategory $subCategory) {
        $subCategory->delete();

        return redirect()->route('sub-categories.index')->with('message', 'Sub Category Deleted Successfully');
    }

    public function restore($subCategoryId) {
        SubCategory::onlyTrashed()->where('id', '=', $subCategoryId)->restore();

        return redirect()->route('sub-categories.index')->with('message', 'Sub Category Restored Successfully');
    }

    public function forceDelete($subCategoryId)
    {
        $subCategory = SubCategory::onlyTrashed()->find($subCategoryId);


        $subCategory->sub_sub_categories()->forceDelete();

        $subCategory->forceDelete();

        return redirect()->route('sub-categories.index')->with('message', 'Sub Category Destroyed Successfully');
    }

    public function getCategorySubCategories($categoryId){

        $subCategories = SubCategory::where('category_id', '=', $categoryId)->get();

        return response()->json([
            'subCategories' => $subCategories

        ], 200);
    }
}
