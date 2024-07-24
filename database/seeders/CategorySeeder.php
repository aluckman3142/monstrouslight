<?php

namespace Database\Seeders;

use App\Models\File;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
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
        $categories = [
            1 => ['id' => 1, 'title' => 'Games Workshop', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete', 'image' => 'games-workshop.jpg', 'logo' => 'games-workshop.png'],
            2 => ['id' => 2, 'title' => 'Privateer Press', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete', 'image' => 'privateer-press.jpg', 'logo' => 'privateer-press.png'],
            3 => ['id' => 3, 'title' => 'Dungeons & Dragons', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete', 'image' => 'dungeons-dragons.jpg', 'logo' => 'dungeons-dragons.png'],
            4 => ['id' => 4, 'title' => 'MTG', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete', 'image' => 'magic-the-gathering.jpg', 'logo' => 'magic-the-gathering.png'],
            5 => ['id' => 5, 'title' => 'Star Wars', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete', 'image' => 'star-wars.jpg', 'logo' => 'star-wars.png'],
            6 => ['id' => 6, 'title' => 'Board Games', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete', 'image' => 'board-games.jpg', 'logo' => 'board-games.png'],
            7 => ['id' => 7, 'title' => 'Card Games', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete', 'image' => 'card-games.jpg', 'logo' => 'card-games.png'],
            8 => ['id' => 8, 'title' => 'Tabletop RPGs', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete', 'image' => 'tabletop-rpgs.jpg', 'logo' => 'tabletop-rpgs.png'],
            9 => ['id' => 9, 'title' => 'Paints & Accessories', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete', 'image' => 'paints-accessories.jpg', 'logo' => 'paints-accessories.png'],
        ];

        $subCategories = [
            1 => ['id' => 1, 'category_id' => 1, 'title' => 'Warhammer 40,000', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete', 'logo' => 'warhammer-40000.png'],
            2 => ['id' => 2, 'category_id' => 1, 'title' => 'Warhammer Age of Sigmar', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete', 'logo' => 'warhammer-age-of-sigmar.png'],
            3 => ['id' => 3, 'category_id' => 1, 'title' => 'Specialist Games', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete', 'logo' => 'specialist-games.png'],
            4 => ['id' => 4, 'category_id' => 1, 'title' => 'Warhammer Horus Heresy', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete', 'logo' => 'warhammer-horus-herasy.png'],
            5 => ['id' => 5, 'category_id' => 1, 'title' => 'Black Library', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete', 'logo' => 'black-library.png'],
            6 => ['id' => 6, 'category_id' => 1, 'title' => 'Paints and Accessories', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete', 'logo' => 'paints-accessories.png'],

            8 => ['id' => 8, 'category_id' => 2, 'title' => 'Warmachine', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete', 'logo' => 'warmachine.png'],
            9 => ['id' => 9, 'category_id' => 2, 'title' => 'Hordes', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete', 'logo' => 'hordes.png'],
            10 => ['id' => 10, 'category_id' => 2, 'title' => 'Riot Quest', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete', 'logo' => 'riot-quest.png'],
            11 => ['id' => 11, 'category_id' => 2, 'title' => 'Iron Kingdoms Roleplay', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete', 'logo' => 'iron-kingdoms.png'],
            12 => ['id' => 12, 'category_id' => 2, 'title' => 'High Command', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete', 'logo' => 'high-command.png'],

            13 => ['id' => 15, 'category_id' => 3, 'title' => 'Source Books', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete', 'logo' => 'source-books.png'],
            14 => ['id' => 16, 'category_id' => 3, 'title' => 'Minatures', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete', 'logo' => 'minatures.png'],
            15 => ['id' => 17, 'category_id' => 3, 'title' => 'D&D Accessories', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete', 'logo' => 'accessories.png'],

            16 => ['id' => 18, 'category_id' => 4, 'title' => 'Magic The Gathering Cards', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete', 'logo' => 'magic-cards.png'],
            17 => ['id' => 19, 'category_id' => 4, 'title' => 'Accessories', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete', 'logo' => 'magic-accessories.png'],

            20 => ['id' => 20, 'category_id' => 7, 'title' => 'Magic The Gathering', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete'],

            18 => ['id' => 21, 'category_id' => 9, 'title' => 'Citadel Color Range', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete'],
            19 => ['id' => 22, 'category_id' => 9, 'title' => 'MP Paints', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete'],
            20 => ['id' => 23, 'category_id' => 9, 'title' => 'Redgrass', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete'],
            21 => ['id' => 24, 'category_id' => 9, 'title' => 'Brushes', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete'],
        ];

        $subSubCategories = [
            1 => ['id' => 1, 'category_id' => 1, 'sub_category_id' => 1, 'title' => 'Space Marines', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete'],
            2 => ['id' => 2, 'category_id' => 1, 'sub_category_id' => 1, 'title' => 'Armies of the Imperium', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete'],
            3 => ['id' => 3, 'category_id' => 1, 'sub_category_id' => 1, 'title' => 'Armies of Chaos', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete'],
            4 => ['id' => 4, 'category_id' => 1, 'sub_category_id' => 1, 'title' => 'Xenos', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete'],
            5 => ['id' => 5, 'category_id' => 1, 'sub_category_id' => 1, 'title' => 'Terrain', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete'],

            6 => ['id' => 6, 'category_id' => 1, 'sub_category_id' => 2, 'title' => 'Start Collecting', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete'],
            7 => ['id' => 7, 'category_id' => 1, 'sub_category_id' => 2, 'title' => 'Grand Alliance Order', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete'],
            8 => ['id' => 8, 'category_id' => 1, 'sub_category_id' => 2, 'title' => 'Grand Alliance Chaos', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete'],
            9 => ['id' => 9, 'category_id' => 1, 'sub_category_id' => 2, 'title' => 'Grand Alliance Death', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete'],
            10 => ['id' => 10, 'category_id' => 1, 'sub_category_id' => 2, 'title' => 'Grand Alliance Destruction', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete'],

            11 => ['id' => 11, 'category_id' => 1, 'sub_category_id' => 3, 'title' => 'BloodBowl', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete'],
            12 => ['id' => 12, 'category_id' => 1, 'sub_category_id' => 3, 'title' => 'Necormunda', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete'],
            13 => ['id' => 13, 'category_id' => 1, 'sub_category_id' => 3, 'title' => 'Killteam', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete'],
            14 => ['id' => 14, 'category_id' => 1, 'sub_category_id' => 3, 'title' => 'Underworlds', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete'],
            15 => ['id' => 15, 'category_id' => 1, 'sub_category_id' => 3, 'title' => 'Lord of the rings', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete'],

            16 => ['id' => 16, 'category_id' => 1, 'sub_category_id' => 4, 'title' => 'Loyalist', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete'],
            17 => ['id' => 17, 'category_id' => 1, 'sub_category_id' => 4, 'title' => 'Traitor', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete'],

            18 => ['id' => 18, 'category_id' => 1, 'sub_category_id' => 6, 'title' => 'Citadel Colour', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete'],
            19 => ['id' => 19, 'category_id' => 1, 'sub_category_id' => 6, 'title' => 'Tools', 'short_desc' => 'Mike/Wayne to complete', 'long_desc' => 'Mike/Wayne to complete'],

        ];

        foreach ($categories as $category) {
            $newCategory = Category::create([
                'id' => $category['id'],
                'title' => $category['title'],
                'slug' => str($category['title'])->slug(),
                'short_desc' => $category['short_desc'],
                'long_desc' => $category['long_desc'],
                'created_by' => 1
            ]);

            File::create([
                'disk' => 'public',
                'fileable_type' => 'App\Models\Category',
                'fileable_id' => $newCategory->id,
                'url' => Storage::disk('public')->url('categories/images/' . $category['image']),
                'path' => 'categories/images/' . $category['image'],
                'original_file_name' => $category['image'],
                'size' => Storage::disk('public')->size('categories/images/' . $category['image']),
                'mime_type' => Storage::disk('public')->mimeType('categories/images/' . $category['image']),
            ]);

            if (isset($category['logo'])) {
                File::create([
                    'disk' => 'public',
                    'fileable_type' => 'App\Models\Category',
                    'fileable_id' => $newCategory->id,
                    'type' => 'logo',
                    'url' => Storage::disk('public')->url('categories/logos/' . $category['logo']),
                    'path' => 'categories/logos/' . $category['logo'],
                    'original_file_name' => $category['logo'],
                    'size' => Storage::disk('public')->size('categories/logos/' . $category['logo']),
                    'mime_type' => Storage::disk('public')->mimeType('categories/logos/' . $category['logo']),
                ]);
            }
        }

        foreach ($subCategories as $subCategory) {
            $newSubCategory = SubCategory::create([
                'id' => $subCategory['id'],
                'category_id' => $subCategory['category_id'],
                'title' => $subCategory['title'],
                'slug' => str($subCategory['title'])->slug(),
                'short_desc' => $subCategory['short_desc'],
                'long_desc' => $subCategory['long_desc'],
                'created_by' => 1
            ]);

            if (isset($subCategory['logo'])) {
                File::create([
                'disk' => 'public',
                'fileable_type' => 'App\Models\SubCategory',
                'fileable_id' => $newSubCategory->id,
                'type' => 'logo',
                'url' => Storage::disk('public')->url('categories/logos/' . $subCategory['logo']),
                'path' => 'categories/logos/' . $subCategory['logo'],
                'original_file_name' => $subCategory['logo'],
                'size' => Storage::disk('public')->size('categories/logos/' . $subCategory['logo']),
                'mime_type' => Storage::disk('public')->mimeType('categories/logos/' . $subCategory['logo']),
            ]);
            }
        }

        foreach ($subSubCategories as $subSubCategory) {
            $newSubSubCategory = SubSubCategory::create([
                'id' => $subSubCategory['id'],
                'category_id' => $subSubCategory['category_id'],
                'sub_category_id' => $subSubCategory['sub_category_id'],
                'title' => $subSubCategory['title'],
                'slug' => str($subSubCategory['title'])->slug(),
                'short_desc' => $subSubCategory['short_desc'],
                'long_desc' => $subSubCategory['long_desc'],
                'created_by' => 1
            ]);
        }
    }
}
