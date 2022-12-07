<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Previlage;

class PrevilageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title = 'diskon 10%';
        Previlage::create([
            'badge_id' => 1,
            'title' => $title,
            'slug' => Str::slug($title, '-'),
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum iure distinctio sunt est quibusdam impedit asperiores exercitationem nam ullam dolor.',
        ]);

        $title = 'diskon 20%';
        Previlage::create([
            'badge_id' => 2,
            'title' => $title,
            'slug' => Str::slug($title, '-'),
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum iure distinctio sunt est quibusdam impedit asperiores exercitationem nam ullam dolor.',
        ]);

        $title = 'diskon 30%';
        Previlage::create([
            'badge_id' => 3,
            'title' => $title,
            'slug' => Str::slug($title, '-'),
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum iure distinctio sunt est quibusdam impedit asperiores exercitationem nam ullam dolor.',
        ]);

        $title = 'cashback 10%';
        Previlage::create([
            'badge_id' => 4,
            'title' => $title,
            'slug' => Str::slug($title, '-'),
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum iure distinctio sunt est quibusdam impedit asperiores exercitationem nam ullam dolor.',
        ]);

        $title = 'cashback 20%';
        Previlage::create([
            'badge_id' => 5,
            'title' => $title,
            'slug' => Str::slug($title, '-'),
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum iure distinctio sunt est quibusdam impedit asperiores exercitationem nam ullam dolor.',
        ]);
    }
}
