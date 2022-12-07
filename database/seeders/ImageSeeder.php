<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Image;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $url = "https://thumbs.dreamstime.com/z/flat-cartoon-panorama-illustration-giraffe-pink-flamingos-lake-african-landscape-215998992.jpg";
        $contents = file_get_contents($url);

        $image = Hash::make(substr($url, strrpos($url, '/') + 1));
        $image = hash('sha256', $image) . '.png';
        Storage::put('\public\wisatas\\' . $image, $contents);
        $title = 'embung tlogo putri';
        Image::create([
            'wisata_id'     => 1,
            'title'         => $title,
            'slug'          => Str::slug($title, '-'),
            'description'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum tempore nam voluptatibus cumque earum velit dolores consectetur consequuntur nemo molestiae animi facilis asperiores, nulla corporis dolorem distinctio veniam excepturi laborum.',
            'image'         => $image,
            'isPrimary'     => true,
        ]);

        $image = Hash::make(substr($url, strrpos($url, '/') + 1));
        $image = hash('sha256', $image) . '.png';
        Storage::put('\public\wisatas\\' . $image, $contents);
        $title = 'pasar oleh-oleh tlogo putri';
        Image::create([
            'wisata_id'     => 1,
            'title'         => $title,
            'slug'          => Str::slug($title, '-'),
            'description'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum tempore nam voluptatibus cumque earum velit dolores consectetur consequuntur nemo molestiae animi facilis asperiores, nulla corporis dolorem distinctio veniam excepturi laborum.',
            'image'         => $image,
            'isPrimary'     => false,
        ]);

        $image = Hash::make(substr($url, strrpos($url, '/') + 1));
        $image = hash('sha256', $image) . '.png';
        Storage::put('\public\wisatas\\' . $image, $contents);
        $title = 'air terjun tlogo putri';
        Image::create([
            'wisata_id'     => 1,
            'title'         => $title,
            'slug'          => Str::slug($title, '-'),
            'description'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum tempore nam voluptatibus cumque earum velit dolores consectetur consequuntur nemo molestiae animi facilis asperiores, nulla corporis dolorem distinctio veniam excepturi laborum.',
            'image'         => $image,
            'isPrimary'     => false,
        ]);
    }
}
