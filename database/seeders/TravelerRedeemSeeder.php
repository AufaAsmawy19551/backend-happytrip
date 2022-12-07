<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TravelerRedeem;

class TravelerRedeemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TravelerRedeem::create([
            'traveler_id' => 2,
            'hartakarun_id' => 1,
        ]);

        TravelerRedeem::create([
            'traveler_id' => 2,
            'hartakarun_id' => 2,
        ]);

        TravelerRedeem::create([
            'traveler_id' => 2,
            'hartakarun_id' => 3,
        ]);
    }
}
