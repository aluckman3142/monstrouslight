<?php

namespace Database\Seeders;

use App\Models\File;
use App\Models\Slide;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slides = [
            1 => ['id' => 1, 'title' => 'MTG: Dominaria', 'text' => "Play Dominaria in store and join our Friday Night Magic Games", 'button_text' => 'Play Dominaria In Store from whatever date with a special offer!', 'button_path' => '/', 'image' => 'dominaria.jpg', 'logo' => 'dominaria.png', 'sort_order' => 1],
            2 => ['id' => 2, 'title' => "Citadel Colour Range", 'text' => "Need paint? Why not check our Citadel Colour Range?", 'button_text' => 'View Citadel Colours', 'button_path' => '/', 'image' => 'citadel.jpg', 'logo' => 'citadel.png', 'sort_order' => 2],
            3 => ['id' => 3, 'title' => 'Monsters of the Multiverse!', 'text' => "Get some fresh new monsters for your next adventure!", 'button_text' => 'Get More Monsters!', 'button_path' => '/', 'image' => 'monstersofthemultiverse.jpg', 'logo' => 'monstersofthemultiverse.png', 'product' => 'monstersofthemultiverse.png', 'sort_order' => 3],
            4 => ['id' => 4, 'title' => 'Nethermaze...', 'text' => "Complex, Competitive and Challenging...", 'button_text' => 'Check Out Nethermaze', 'button_path' => '/', 'image' => 'nethermaze.jpg', 'product' => 'nethermaze.png', 'logo' => 'nethermaze.png', 'sort_order' => 4],
        ];

        foreach ($slides as $slide) {
            $newSlide = Slide::create([
                'id' => $slide['id'],
                'title' => $slide['title'],
                'text' => $slide['text'],
                'button_text' => $slide['button_text'],
                'button_path' => $slide['button_path'],
                'sort_order' => $slide['sort_order'],
                'created_by' => 1
            ]);

            File::create([
                'disk' => 'public',
                'fileable_type' => 'App\Models\Slide',
                'fileable_id' => $newSlide->id,
                'url' => Storage::disk('public')->url('slides/' . $slide['image']),
                'path' => 'slides/' . $slide['image'],
                'original_file_name' => $slide['image'],
                'size' => Storage::disk('public')->size('slides/' . $slide['image']),
                'mime_type' => Storage::disk('public')->mimeType('slides/' . $slide['image']),
            ]);

            if (isset($slide['logo'])) {
                File::create([
                    'disk' => 'public',
                    'fileable_type' => 'App\Models\Slide',
                    'fileable_id' => $newSlide->id,
                    'type' => 'logo',
                    'url' => Storage::disk('public')->url('slides/logos/' . $slide['logo']),
                    'path' => 'slides/logos/' . $slide['logo'],
                    'original_file_name' => $slide['logo'],
                    'size' => Storage::disk('public')->size('slides/logos/' . $slide['logo']),
                    'mime_type' => Storage::disk('public')->mimeType('slides/logos/' . $slide['logo']),
                ]);
            }

            if (isset($slide['product'])) {
                File::create([
                    'disk' => 'public',
                    'fileable_type' => 'App\Models\Slide',
                    'fileable_id' => $newSlide->id,
                    'type' => 'product',
                    'url' => Storage::disk('public')->url('slides/products/' . $slide['product']),
                    'path' => 'slides/products/' . $slide['product'],
                    'original_file_name' => $slide['product'],
                    'size' => Storage::disk('public')->size('slides/products/' . $slide['product']),
                    'mime_type' => Storage::disk('public')->mimeType('slides/products/' . $slide['product']),
                ]);
            }
        }
    }
}
