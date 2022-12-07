<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Badge;



class BadgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $url = "https://cdn.vectorstock.com/i/1000x1000/52/94/star-badge-icon-design-template-vector-24055294.webp";
        $contents = file_get_contents($url);

        $image = Hash::make(substr($url, strrpos($url, '/') + 1));
        $image = hash('sha256', $image) . '.png';
        Storage::put('\public\badges\\' . $image, $contents);
        $title = "Bassic";
        Badge::create([
            'title' => $title,
            'slug'  => Str::slug($title, '-'),
            'image' => $image,
            'point' => 100,
        ]);

        $image = Hash::make(substr($url, strrpos($url, '/') + 1));
        $image = hash('sha256', $image) . '.png';
        Storage::put('\public\badges\\' . $image, $contents);
        $title = "Medium";
        Badge::create([
            'title' => $title,
            'slug'  => Str::slug($title, '-'),
            'image' => $image,
            'point' => 100,
        ]);

        $image = Hash::make(substr($url, strrpos($url, '/') + 1));
        $image = hash('sha256', $image) . '.png';
        Storage::put('\public\badges\\' . $image, $contents);
        $title = "Premium";
        Badge::create([
            'title' => $title,
            'slug'  => Str::slug($title, '-'),
            'image' => $image,
            'point' => 100,
        ]);

        $image = Hash::make(substr($url, strrpos($url, '/') + 1));
        $image = hash('sha256', $image) . '.png';
        Storage::put('\public\badges\\' . $image, $contents);
        $title = "Platinum";
        Badge::create([
            'title' => $title,
            'slug'  => Str::slug($title, '-'),
            'image' => $image,
            'point' => 100,
        ]);

        $image = Hash::make(substr($url, strrpos($url, '/') + 1));
        $image = hash('sha256', $image) . '.png';
        Storage::put('\public\badges\\' . $image, $contents);
        $title = "Ultimate";
        Badge::create([
            'title' => $title,
            'slug'  => Str::slug($title, '-'),
            'image' => $image,
            'point' => 100,
        ]);
    }
}
