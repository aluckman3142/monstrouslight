<?php

namespace Database\Seeders;

use App\Models\File;
use App\Models\BlogPost;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogPosts = [
            1 => ['id' => 1, 'title' => 'Test Blog Post Title 1', 'content' => 'This is the content for the blog post... Mike/Wayne to complete', 'youtube_link' => 'https://www.youtube.com/embed/8zXGISMfvqY', 'images' => ['games-workshop.jpg', 'privateer-press.jpg', 'dungeons-dragons.jpg']],
            2 => ['id' => 2, 'title' => 'Test Blog Post Title 2', 'content' => 'This is the content for the blog post... Mike/Wayne to complete', 'youtube_link' => 'https://www.youtube.com/embed/8zXGISMfvqY', 'images' => ['games-workshop.jpg', 'privateer-press.jpg', 'dungeons-dragons.jpg']],
            3 => ['id' => 3, 'title' => 'Test Blog Post Title 3', 'content' => 'This is the content for the blog post... Mike/Wayne to complete', 'youtube_link' => 'https://www.youtube.com/embed/8zXGISMfvqY', 'images' => ['games-workshop.jpg', 'privateer-press.jpg', 'dungeons-dragons.jpg']],
        ];

        foreach ($blogPosts as $blogPost) {
            $newBlogPost = BlogPost::create([
                'id' => $blogPost['id'],
                'title' => $blogPost['title'],
                'slug' => str($blogPost['title'])->slug(),
                'snippet' => Str::substr($blogPost['content'], 0, 100),
                'content' => $blogPost['content'],
                'youtube_link' => $blogPost['youtube_link'],
                'created_by' => 13
            ]);

            foreach ($blogPost['images'] as $image) {
                File::create([
                    'disk' => 'public',
                    'fileable_type' => 'App\Models\BlogPost',
                    'fileable_id' => $newBlogPost ->id,
                    'url' => Storage::disk('public')->url('blog/images/' . $image),
                    'path' => 'blog/images/' . $image,
                    'original_file_name' => $image,
                    'size' => Storage::disk('public')->size('blog/images/' . $image),
                    'mime_type' => Storage::disk('public')->mimeType('blog/images/' . $image),
                ]);
            }
        }
    }
}
