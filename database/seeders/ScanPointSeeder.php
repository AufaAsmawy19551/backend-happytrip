<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\ScanPoint;

class ScanPointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title = 'embung tlogo putri';
        ScanPoint::create([
            'wisata_id'     => 1,
            'title'         => $title,
            'slug'          => Str::slug($title, '-'),
            'description'   => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia, molestiae. Asperiores minima assumenda quia obcaecati ratione, magnam beatae vel ab!',
            'code'          => hash('sha256', $title . 'scan code'),
            'point'         => 100,
        ]);

        $title = 'pasar oleh-oleh tlogo putri';
        ScanPoint::create([
            'wisata_id'     => 1,
            'title'         => $title,
            'slug'          => Str::slug($title, '-'),
            'description'   => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia, molestiae. Asperiores minima assumenda quia obcaecati ratione, magnam beatae vel ab!',
            'code'          => hash('sha256', $title . 'scan code'),
            'point'         => 100,
        ]);

        $title = 'air terjun tlogo putri';
        ScanPoint::create([
            'wisata_id'     => 1,
            'title'         => $title,
            'slug'          => Str::slug($title, '-'),
            'description'   => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia, molestiae. Asperiores minima assumenda quia obcaecati ratione, magnam beatae vel ab!',
            'code'          => hash('sha256', $title . 'scan code'),
            'point'         => 100,
        ]);

        $title = 'pantai parangtritis';
        ScanPoint::create([
            'wisata_id'     => 2,
            'title'         => $title,
            'slug'          => Str::slug($title, '-'),
            'description'   => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia, molestiae. Asperiores minima assumenda quia obcaecati ratione, magnam beatae vel ab!',
            'code'          => hash('sha256', $title . 'scan code'),
            'point'         => 100,
        ]);

        $title = 'kraton yogyakarta';
        ScanPoint::create([
            'wisata_id'     => 3,
            'title'         => $title,
            'slug'          => Str::slug($title, '-'),
            'description'   => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quia, molestiae. Asperiores minima assumenda quia obcaecati ratione, magnam beatae vel ab!',
            'code'          => hash('sha256', $title . 'scan code'),
            'point'         => 100,
        ]);
    }
}
