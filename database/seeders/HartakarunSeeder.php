<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Hartakarun;

class HartakarunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title = 'diskon 10%';
        Hartakarun::create([
            'title'         => $title,
            'slug'          => Str::slug($title, '-'),
            'description'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi quod vel dolor et cumque hic magni dolorum ducimus saepe porro!',
            'point'         => 100,
        ]);

        $title = 'diskon 20%';
        Hartakarun::create([
            'title'         => $title,
            'slug'          => Str::slug($title, '-'),
            'description'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi quod vel dolor et cumque hic magni dolorum ducimus saepe porro!',
            'point'         => 100,
        ]);

        $title = 'diskon 30%';
        Hartakarun::create([
            'title'         => $title,
            'slug'          => Str::slug($title, '-'),
            'description'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi quod vel dolor et cumque hic magni dolorum ducimus saepe porro!',
            'point'         => 100,
        ]);

        $title = 'cashback 10%';
        Hartakarun::create([
            'title'         => $title,
            'slug'          => Str::slug($title, '-'),
            'description'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi quod vel dolor et cumque hic magni dolorum ducimus saepe porro!',
            'point'         => 100,
        ]);

        $title = 'cashback 20%';
        Hartakarun::create([
            'title'         => $title,
            'slug'          => Str::slug($title, '-'),
            'description'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi quod vel dolor et cumque hic magni dolorum ducimus saepe porro!',
            'point'         => 100,
        ]);
    }
}
