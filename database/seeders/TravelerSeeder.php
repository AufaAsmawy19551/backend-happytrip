<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Traveler;

class TravelerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $url = "https://st2.depositphotos.com/1104517/11965/v/950/depositphotos_119659092-stock-illustration-male-avatar-profile-picture-vector.jpg";
        $contents = file_get_contents($url);

        $image = Hash::make(substr($url, strrpos($url, '/') + 1));
        $image = hash('sha256', $image) . '.png';
        Storage::put('\public\travelers\\' . $image, $contents);
        $name = 'eko';
        Traveler::create([
            'badge_id' => 1,
            'name'      => $name,
            'slug'      => Str::slug($name, '-'),
            'email'     => $name . '@gmail.com',
            'password'  => Hash::make('password'),
            'image'     => $image,
        ]);

        $image = Hash::make(substr($url, strrpos($url, '/') + 1));
        $image = hash('sha256', $image) . '.png';
        Storage::put('\public\travelers\\' . $image, $contents);
        $name = 'joko';
        Traveler::create([
            'badge_id' => 2,
            'name'      => $name,
            'slug'      => Str::slug($name, '-'),
            'email'     => $name . '@gmail.com',
            'password'  => Hash::make('password'),
            'image'     => $image,
        ]);

        $image = Hash::make(substr($url, strrpos($url, '/') + 1));
        $image = hash('sha256', $image) . '.png';
        Storage::put('\public\travelers\\' . $image, $contents);
        $name = 'budi';
        Traveler::create([
            'badge_id' => 3,
            'name'      => $name,
            'slug'      => Str::slug($name, '-'),
            'email'     => $name . '@gmail.com',
            'password'  => Hash::make('password'),
            'image'     => $image,
        ]);

        $image = Hash::make(substr($url, strrpos($url, '/') + 1));
        $image = hash('sha256', $image) . '.png';
        Storage::put('\public\travelers\\' . $image, $contents);
        $name = 'edi';
        Traveler::create([
            'badge_id' => 4,
            'name'      => $name,
            'slug'      => Str::slug($name, '-'),
            'email'     => $name . '@gmail.com',
            'password'  => Hash::make('password'),
            'image'     => $image,
        ]);

        $image = Hash::make(substr($url, strrpos($url, '/') + 1));
        $image = hash('sha256', $image) . '.png';
        Storage::put('\public\travelers\\' . $image, $contents);
        $name = 'agus';
        Traveler::create([
            'badge_id' => 5,
            'name'      => $name,
            'slug'      => Str::slug($name, '-'),
            'email'     => $name . '@gmail.com',
            'password'  => Hash::make('password'),
            'image'     => $image,
        ]);
    }
}
