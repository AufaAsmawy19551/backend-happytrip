<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Admin;


class AdminSeeder extends Seeder
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
        Storage::put('\public\admins\\' . $image, $contents);
        $name = 'admin';
        Admin::create([
            'name'      => $name,
            'slug'      => Str::slug($name, '-'),
            'email'     => $name . 'gmail.com',
            'password'  => Hash::make('password'),
            'image'     => $image,
        ]);
    }
}
