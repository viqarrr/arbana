<?php

namespace Database\Seeders;

use App\Models\AboutDescription;
use App\Models\AboutExcellence;
use App\Models\AboutHistory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $description = [
            'heading' => 'Discover Nature, Embrace the Adventure',
            'paragraph' => 'We connect adventurers with the beauty of nature by guiding them through unforgettable mountain trails, breathtaking landscapes, and authentic outdoor experiences.'
        ];
        $history = [
            'heading' => 'Discover Nature, Embrace the Adventure',
            'paragraph' => '<p>We connect adventurers with the beauty of nature by guiding them through unforgettable mountain trails, breathtaking landscapes, and authentic outdoor experiences.</p>',
            'image' => 'images/about/history.jpg',
        ];
        $excellence = [
            'heading' => 'Discover Nature, Embrace the Adventure',
            'paragraph' => '<p>We connect adventurers with the beauty of nature by guiding them through unforgettable mountain trails, breathtaking landscapes, and authentic outdoor experiences.</p>',
            'image' => '<p>We connect adventurers with the beauty of nature by guiding them through unforgettable mountain trails, breathtaking landscapes, and authentic outdoor experiences.</p>',
        ];

        AboutDescription::create($description);
        AboutHistory::create($history);
        AboutExcellence::create($excellence);
    }
}
