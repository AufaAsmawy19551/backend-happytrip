<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\File;
use App\Models\Badge;

// use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Seeder;
// use Illuminate\Support\Str;
// use Illuminate\Http\File;
// use App\Models\Badge;




/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Badge>
 */
class BadgeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Badge::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $url = "https://thumbs.dreamstime.com/z/flat-cartoon-panorama-illustration-giraffe-pink-flamingos-lake-african-landscape-215998992.jpg";
        $contents = file_get_contents($url);
        $image = Hash::make(substr($url, strrpos($url, '/') + 1));
        $image = hash('sha256', $image) . '.png';
        Storage::put('\public\badges\A' . $image, $contents);

        $title = $this->faker->word(3);
        return [
            'title' => $title,
            'slug'  => Str::slug($title, '-'),
            'image' => $image,
            'point' => 100,
        ];
    }
}
