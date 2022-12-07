<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Mission;

class MissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title = 'keliling yogyakarta';
        Mission::create([
            'title'         => $title,
            'slug'          => Str::slug($title, '-'),
            'description'   => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi quod vel dolor et cumque hic magni dolorum ducimus saepe porro!',
            'point'         => 100,
        ]);
    }
}
