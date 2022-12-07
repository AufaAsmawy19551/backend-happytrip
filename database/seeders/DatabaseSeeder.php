<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            BadgeSeeder::class,
            PrevilageSeeder::class,
            TravelerSeeder::class,
            AdminSeeder::class,
            HartakarunSeeder::class,
            TravelerRedeemSeeder::class,
            WisataSeeder::class,
            ScanPointSeeder::class,
            TravelerScanSeeder::class,
            ImageSeeder::class,
            RatingReviewSeeder::class,
            MissionSeeder::class,
            WisataMissionSeeder::class,
            TravelerMissionSeeder::class,
        ]);
    }
}
