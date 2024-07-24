<?php

namespace App\Http\Controllers;

use App\Models\File;
use Inertia\Inertia;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{

    public function index(Request $request){

        if ($request->search){
            $slides = Slide::where('title', 'like', "%{$request->search}%")->get();
        } else {
            $slides = Slide::all();
        }

        if ($request->boolean('deleted') === true) {
            if ($request->search){
                $slides = Slide::onlyTrashed()->where('title', 'like', "%{$request->search}%")->get();
            } else {
                $slides = Slide::onlyTrashed()->get();
            }
        }


        $filters = $request->search ? ['search' => $request->search] : ['search' => ''];

        return Inertia::render('Admin/Slides', [
            'slides' => $slides,
            'filters' => $filters,
        ]);
    }

    public function store(Slide $slide, Request $request) {

        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'button_text' => 'required',
            'button_path' => 'required',
        ],
        [
            'title.required' => 'Please enter a Slide Name',
            'text.required' => 'Please enter slide text',
            'button_text.required' => 'Please enter button text',
            'button_path.required' => 'Please enter button link'
        ]);

        $newSlide = Slide::create([
            'title' => $request->title,
            'text' => $request->text,
            'button_text' => $request->button_text,
            'button_path' => $request->button_path,
            'sort_order' => 0
        ]);

        if ($request->image){

            $imageName = str($newSlide->title)->slug().'.jpg';

            $image = $request->image->storeAs('slides/',$imageName,'public');

             File::create([
                'disk' => 'public',
                'fileable_type' => 'App\Models\Slide',
                'fileable_id' => $newSlide->id,
                'url' => Storage::disk('public')->url('slides/' . $imageName),
                'path' => 'slides/' . $imageName,
                'original_file_name' => $imageName,
                'size' => Storage::disk('public')->size('slides/' . $imageName),
                'mime_type' => Storage::disk('public')->mimeType('slides/' . $imageName),
            ]);
        }

        if ($request->logo){

            $imageName = str($newSlide->title)->slug().'.png';

            $logo = $request->logo->storeAs('slides/logos',$imageName,'public');

             File::create([
                'disk' => 'public',
                'fileable_type' => 'App\Models\Slide',
                'fileable_id' => $newSlide->id,
                'type' => 'logo',
                'url' => Storage::disk('public')->url('slides/logos/' . $imageName),
                'path' => 'slides/logos/' . $imageName,
                'original_file_name' => $imageName,
                'size' => Storage::disk('public')->size('slides/logos/' . $imageName),
                'mime_type' => Storage::disk('public')->mimeType('slides/logos/' . $imageName),
            ]);
        }

        if ($request->product){

            $imageName = str($newSlide->title)->slug().'.png';

            $logo = $request->logo->storeAs('slides/products',$imageName,'public');

             File::create([
                'disk' => 'public',
                'fileable_type' => 'App\Models\Slide',
                'fileable_id' => $newSlide->id,
                'type' => 'product',
                'url' => Storage::disk('public')->url('slides/products/' . $imageName),
                'path' => 'slides/products/' . $imageName,
                'original_file_name' => $imageName,
                'size' => Storage::disk('public')->size('slides/products/' . $imageName),
                'mime_type' => Storage::disk('public')->mimeType('slides/products/' . $imageName),
            ]);
        }

        return redirect()->route('slides.index')->with('message', 'Slide Added Successfully');

    }

    public function update(Slide $slide, Request $request) {

        $request->validate([
            'title' => 'required',
            'text' => 'required',
            'button_text' => 'required',
            'button_path' => 'required',
        ],
        [
            'title.required' => 'Please enter a Slide Name',
            'text.required' => 'Please enter slide text',
            'button_text.required' => 'Please enter button text',
            'button_path.required' => 'Please enter button link'
        ]);

        $slide->update([
            'title' => $request->title,
            'text' => $request->text,
            'button_text' => $request->button_text,
            'button_path' => $request->button_path,
        ]);

        if ($request->image){

            $slide->image->delete();

            $imageName = str($slide->title)->slug().'.jpg';

            $image = $request->image->storeAs('slides/',$imageName,'public');

             File::create([
                'disk' => 'public',
                'fileable_type' => 'App\Models\Slide',
                'fileable_id' => $slide->id,
                'url' => Storage::disk('public')->url('slides/' . $imageName),
                'path' => 'slides/' . $imageName,
                'original_file_name' => $imageName,
                'size' => Storage::disk('public')->size('slides/' . $imageName),
                'mime_type' => Storage::disk('public')->mimeType('slides/' . $imageName),
            ]);
        }

        if ($request->logo){

            $slide->logo->delete();

            $imageName = str($slide->title)->slug().'.png';

            $logo = $request->logo->storeAs('slides/logos/',$imageName,'public');

             File::create([
                'disk' => 'public',
                'fileable_type' => 'App\Models\Slide',
                'fileable_id' => $slide->id,
                'type' => 'logo',
                'url' => Storage::disk('public')->url('slides/logos/' . $imageName),
                'path' => 'slides/images/' . $imageName,
                'original_file_name' => $imageName,
                'size' => Storage::disk('public')->size('slides/logos/' . $imageName),
                'mime_type' => Storage::disk('public')->mimeType('slides/logos/' . $imageName),
            ]);
        }

        if ($request->product){

            $slide->product->delete();

            $imageName = str($slide->title)->slug().'.png';

            $product = $request->product->storeAs('slides/products/',$imageName,'public');

             File::create([
                'disk' => 'public',
                'fileable_type' => 'App\Models\Slide',
                'fileable_id' => $slide->id,
                'type' => 'product',
                'url' => Storage::disk('public')->url('slides/products/' . $imageName),
                'path' => 'slides/products/' . $imageName,
                'original_file_name' => $imageName,
                'size' => Storage::disk('public')->size('slides/products/' . $imageName),
                'mime_type' => Storage::disk('public')->mimeType('slides/products/' . $imageName),
            ]);
        }

       return redirect()->route('slides.index')->with('message', 'Slide Updated Successfully');

    }

    public function updateStatus($slideId) {
        $slide = Slide::find($slideId);

        $slide->enabled = !$slide->enabled;

        $slide->save();

        return redirect()->route('slides.index')->with('message', 'Slide Status Updated Successfully');
    }

    public function delete(Slide $slide) {
        $slide->delete();

        return redirect()->route('slides.index')->with('message', 'Slide Deleted Successfully');
    }

    public function restore($slideId) {
        Slide::onlyTrashed()->where('id', '=', $slideId)->restore();

        return redirect()->route('slides.index')->with('message', 'Slide Restored Successfully');
    }

    public function forceDelete($slideId)
    {
        $slide = Slide::onlyTrashed()->find($slideId);

        $slide->image()->forceDelete();
        $slide->logo()->forceDelete();

        $slide->forceDelete();

        return redirect()->route('slides.index')->with('message', 'Slide Destroyed Successfully');
    }
}
