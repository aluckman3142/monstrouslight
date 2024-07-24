<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\BlogPost;
use App\Models\Product;
use App\Models\BlogPostProduct;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index(){

        $latestPosts = BlogPost::orderBy('created_at', 'DESC')->where('enabled', '=', 1)->limit(12)->get();

        return Inertia::render('Blog', [
            'latestPosts' => $latestPosts
        ]);
    }

    public function indexAdmin(Request $request){

        if ($request->search){
            $blogPosts = BlogPost::where('title', 'like', "%{$request->search}%")->get();
        } else {
            $blogPosts = BlogPost::all();
        }

        if ($request->boolean('deleted') === true) {
            if ($request->search){
                $blogPosts = BlogPost::onlyTrashed()->where('title', 'like', "%{$request->search}%")->get();
            } else {
                $blogPosts = BlogPost::onlyTrashed()->get();
            }
        }


        $filters = $request->search ? ['search' => $request->search] : ['search' => ''];

        return Inertia::render('Admin/BlogPosts', [
            'blogPosts' => $blogPosts,
            'filters' => $filters,
        ]);
    }

    public function show($slug){

        $blogPost = BlogPost::where('slug', '=', $slug)->where('enabled', '=', 1)->first();

       // $related_products = Product::inRandomOrder()->get()->take(4);

        return Inertia::render('BlogPost', [
            'blogPost' => $blogPost,
          //  'related_products' => $related_products
        ]);
    }

    public function store(BlogPost $blogPost, Request $request) {

        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ],
        [
            'title.required' => 'Please enter a Poat Title',
            'content.required' => 'Please enter some Post Content'
        ]);

        $newBlogPost = BlogPost::create([
            'title' => $request->title,
            'slug' => str($request->title)->slug(),
            'snippet' => substr($request->content, 0, 100),
            'content' => $request->content,
            'youtube_link' => $request->youtube_link,
            'created_by' => Auth::user()->id
        ]);

        if ($request->images){
            foreach ($request->images as $newImage) {
                $imageName = $newBlogPost->slug.rand(1, 9999).'.jpg';

                $image = $newImage->storeAs('blog/images',$imageName,'public');

                File::create([
                    'disk' => 'public',
                    'fileable_type' => 'App\Models\BlogPost',
                    'fileable_id' => $newBlogPost->id,
                    'url' => Storage::disk('public')->url('blog/images/' . $imageName),
                    'path' => 'blog/images/' . $imageName,
                    'original_file_name' => $imageName,
                    'size' => Storage::disk('public')->size('blog/images/' . $imageName),
                    'mime_type' => Storage::disk('public')->mimeType('blog/images/' . $imageName),
                ]);
            }
        }

        foreach ($request->blogPostProducts as $blogPostProduct) {
            BlogPostProduct::create([
                'blog_post_id' => $newBlogPost->id,
                'product_id' => $blogPostProduct['product']['id'],
            ]);
        }

        return redirect()->route('blog-posts.index')->with('message', 'Blog Post Added Successfully');

    }

    public function update(BlogPost $blogPost, Request $request) {

        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ],
        [
            'title.required' => 'Please enter a Poat Title',
            'content.required' => 'Please enter some Post Content'
        ]);

        $blogPost->update([
            'title' => $request->title,
            'slug' => str($request->title)->slug(),
            'snippet' => substr($request->content, 0, 100),
            'content' => $request->content,
            'youtube_link' => $request->youtube_link,
            'updated_by' => Auth::user()->id
        ]);

        if ($request->images){
            $blogPost->images()->delete();
            foreach ($request->images as $newImage) {
                $imageName = $blogPost->slug.rand(1, 9999).'.jpg';

                $image = $newImage->storeAs('blog/images',$imageName,'public');

                File::create([
                    'disk' => 'public',
                    'fileable_type' => 'App\Models\BlogPost',
                    'fileable_id' => $blogPost->id,
                    'url' => Storage::disk('public')->url('blog/images/' . $imageName),
                    'path' => 'blog/images/' . $imageName,
                    'original_file_name' => $imageName,
                    'size' => Storage::disk('public')->size('blog/images/' . $imageName),
                    'mime_type' => Storage::disk('public')->mimeType('blog/images/' . $imageName),
                ]);
            }
        }

        return redirect()->route('blog-posts.index')->with('message', 'Blog Post  Successfully');

    }

    public function updateStatus($blogPostId) {
        $blogPost = BlogPost::find($blogPostId);

        $blogPost->enabled = !$blogPost->enabled;

        $blogPost->save();

        return redirect()->route('blog-posts.index')->with('message', 'Blog Post Status Updated Successfully');
    }

    public function delete(BlogPost $blogPost) {
        $blogPost->delete();

        return redirect()->route('blog-posts.index')->with('message', 'Blog Post Deleted Successfully');
    }

    public function restore($blogPostId) {
        BlogPost::onlyTrashed()->where('id', '=', $blogPostId)->restore();

        return redirect()->route('blog-posts.index')->with('message', 'Blog Post Restored Successfully');
    }

    public function forceDelete($blogPostId)
    {
        $blogPost = BlogPost::onlyTrashed()->find($blogPostId);

        $blogPost->images()->forceDelete();
       
        $blogPost->forceDelete();

        return redirect()->route('blog-posts.index')->with('message', 'Blog Post Destroyed Successfully');
    }

}
