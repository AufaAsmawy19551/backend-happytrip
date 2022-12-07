<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Http\File;
use App\Models\Wisata;

class WisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $url = "https://i0.wp.com/www.kyailanggeng.com/wp-content/uploads/2020/01/PETA-TAMAN-KYAI-LANGGENG-2020.png?w=779&ssl=1";
        $contents = file_get_contents($url);

        $denah = Hash::make(substr($url, strrpos($url, '/') + 1));
        $denah = hash('sha256', $denah) . '.png';
        Storage::put('\public\denahs\\' . $denah, $contents);
        $title = 'tlogo putri';
        Wisata::create([
            'title'         => $title,
            'slug'          => Str::slug($title, '-'),
            'description'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, ipsa dignissimos nostrum et cumque repudiandae facere temporibus accusantium quidem itaque.',
            'location'      => 'location',
            'harga_tiket'   => 10000,
            'point'          => 100,
            'denah'         => $denah,
            'video'         => 'https://www.youtube.com/watch?v=1V_4-f5Ocy4',
        ]);

        $denah = Hash::make(substr($url, strrpos($url, '/') + 1));
        $denah = hash('sha256', $denah) . '.png';
        Storage::put('\public\wisatas\\' . $denah, $contents);
        $title = 'pantai parangtritis';
        Wisata::create([
            'title'         => $title,
            'slug'          => Str::slug($title, '-'),
            'description'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, ipsa dignissimos nostrum et cumque repudiandae facere temporibus accusantium quidem itaque.',
            'location'      => 'location',
            'harga_tiket'   => 10000,
            'point'          => 100,
            'denah'         => $denah,
            'video'         => 'https://www.youtube.com/watch?v=1V_4-f5Ocy4',
        ]);

        $denah = Hash::make(substr($url, strrpos($url, '/') + 1));
        $denah = hash('sha256', $denah) . '.png';
        Storage::put('\public\wisatas\\' . $denah, $contents);
        $title = 'keraton yogyakarta';
        Wisata::create([
            'title'         => $title,
            'slug'          => Str::slug($title, '-'),
            'description'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, ipsa dignissimos nostrum et cumque repudiandae facere temporibus accusantium quidem itaque.',
            'location'      => 'location',
            'harga_tiket'   => 10000,
            'point'          => 100,
            'denah'         => $denah,
            'video'         => 'https://www.youtube.com/watch?v=1V_4-f5Ocy4',
        ]);
    }
}
