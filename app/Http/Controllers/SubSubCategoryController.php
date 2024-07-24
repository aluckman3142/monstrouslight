<?php

namespace App\Http\Controllers;

use App\Models\File;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\SubSubCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SubSubCategoryController extends Controller
{

    public function index(Request $request){

        if ($request->search){
            $subSubCategories = SubSubCategory::where('title', 'like', "%{$request->search}%")->with('sub_category', 'sub_category.category')->get();
        } else {
            $subSubCategories = SubSubCategory::with('sub_category', 'sub_category.category')->get();
        }

        if ($request->boolean('deleted') === true) {
            if ($request->search){
                $subSubCategories = SubSubCategory::onlyTrashed()->with('sub_category', 'sub_category.category')->where('title', 'like', "%{$request->search}%")->get();
            } else {
                $subSubCategories = SubSubCategory::onlyTrashed()->with('sub_category', 'sub_category.category')->get();
            }
        }

        $filters = $request->search ? ['search' => $request->search] : ['search' => ''];

        return Inertia::render('Admin/SubSubCategories', [
            'subSubCategories' => $subSubCategories,
            'filters' => $filters,
        ]);
    }

    public function store(SubSubCategory $subSubCategory, Request $request) {

        $request->validate([
            'title' => 'required',
            'short_desc' => 'required',
            'long_desc' => 'required',
            'sub_category_id' => 'required',
        ],
        [
            'title.required' => 'Please enter a Sub Category Name',
            'short_desc.required' => 'Please enter a Short Description',
            'long_desc.required' => 'Please enter a Long Description',
            'sub_category_id.required' => 'Please select a Parent Sub Category '
        ]);

        $newSubSubCategory = SubSubCategory::create([
            'title' => $request->title,
            'slug' => str($request->title)->slug(),
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'created_by' => Auth::user()->id
        ]);

        return redirect()->route('sub-sub-categories.index')->with('message', 'Sub Sub Category Added Successfully');

    }

    public function update(SubSubCategory $subSubCategory, Request $request) {

        $request->validate([
            'title' => 'required',
            'short_desc' => 'required',
            'long_desc' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
        ],
        [
            'title.required' => 'Please enter a Category Name',
            'short_desc.required' => 'Please enter a Short Description',
            'long_desc.required' => 'Please enter a Long Description',
            'category_id.required' => 'Please select a Parent Category',
            'sub_category_id.required' => 'Please select a Parent Sub Category'
        ]);

        $subSubCategory->update([
            'title' => $request->title,
            'slug' => str($request->title)->slug(),
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'created_by' => Auth::user()->id
        ]);

       return redirect()->route('sub-sub-categories.index')->with('message', 'Sub Sub Category Updated Successfully');

    }

    public function updateStatus($subSubCategoryId) {
        $subSubCategory = SubSubCategory::find($subSubCategoryId);

        $subSubCategory->enabled = !$subSubCategory->enabled;

        $subSubCategory->save();

        return redirect()->route('sub-sub-categories.index')->with('message', 'Sub Sub Category Status Updated Successfully');
    }

    public function delete(SubSubCategory $subSubCategory) {
        $subSubCategory->delete();

        return redirect()->route('sub-sub-categories.index')->with('message', 'Sub Sub Category Deleted Successfully');
    }

    public function restore($subSubCategoryId) {
        SubSubCategory::onlyTrashed()->where('id', '=', $subSubCategoryId)->restore();

        return redirect()->route('sub-sub-categories.index')->with('message', 'Sub Sub Category Restored Successfully');
    }

    public function forceDelete($subSubCategoryId)
    {
        $subSubCategory = SubSubCategory::onlyTrashed()->find($subSubCategoryId);

        $subSubCategory->forceDelete();

        return redirect()->route('sub-sub-categories.index')->with('message', 'Sub Sub Category Destroyed Successfully');
    }

    public function getSubCategorySubSubCategories($subCategoryId){

        $subSubCategories = SubSubCategory::where('sub_category_id', '=', $subCategoryId)->get();

        return response()->json([
            'subSubCategories' => $subSubCategories
        ], 200);
    }
}
