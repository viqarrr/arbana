<?php

namespace Database\Seeders;

use App\Models\Destination;
use App\Models\DestinationImage;
use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
    public function run(): void
    {
        $mountains = [
            // Gunung besar
            ['name' => 'Mt. Kawi',          'region' => 'East Java', 'mdpl' => 2551, 'meeting_point' => 'Malang'],
            ['name' => 'Mt. Ijen',          'region' => 'East Java', 'mdpl' => 2799, 'meeting_point' => 'Bondowoso'],
            ['name' => 'Mt. Butak',         'region' => 'East Java', 'mdpl' => 2868, 'meeting_point' => 'Batu'],
            ['name' => 'Mt. Argopuro',      'region' => 'East Java', 'mdpl' => 3008, 'meeting_point' => 'Probolinggo'],
            ['name' => 'Mt. Lawu',          'region' => 'East Java', 'mdpl' => 3265, 'meeting_point' => 'Tawangmangu'],
            ['name' => 'Mt. Raung',         'region' => 'East Java', 'mdpl' => 3332, 'meeting_point' => 'Bondowoso'],
            ['name' => 'Mt. Arjuno',        'region' => 'East Java', 'mdpl' => 3339, 'meeting_point' => 'Mojokerto'],
            ['name' => 'Mt. Semeru',        'region' => 'East Java', 'mdpl' => 3676, 'meeting_point' => 'Lumajang'],

            // Anak Gunung / Puthuk
            ['name' => 'Puthuk Semar',      'region' => 'East Java', 'mdpl' => 933,  'meeting_point' => 'Mojokerto'],
            ['name' => 'Mt. Rengganis',     'region' => 'East Java', 'mdpl' => 1100, 'meeting_point' => 'Mojokerto'],
            ['name' => 'Mt. Janda',         'region' => 'East Java', 'mdpl' => 1100, 'meeting_point' => 'Mojokerto'],
            ['name' => 'Mt. Lorokan',       'region' => 'East Java', 'mdpl' => 1100, 'meeting_point' => 'Mojokerto'],
            ['name' => 'Puthuk Watu Jenger','region' => 'East Java', 'mdpl' => 1100, 'meeting_point' => 'Mojokerto'],
            ['name' => 'Puthuk Cendono',    'region' => 'East Java', 'mdpl' => 1131, 'meeting_point' => 'Mojokerto'],
            ['name' => 'Mt. Sarah Klopo',   'region' => 'East Java', 'mdpl' => 1234, 'meeting_point' => 'Mojokerto'],
            ['name' => 'Mt. Bekel',         'region' => 'East Java', 'mdpl' => 1250, 'meeting_point' => 'Mojokerto'],
            ['name' => 'Puthuk Kentongan',  'region' => 'East Java', 'mdpl' => 1305, 'meeting_point' => 'Mojokerto'],
            ['name' => 'Puthuk Watu',       'region' => 'East Java', 'mdpl' => 1305, 'meeting_point' => 'Mojokerto'],
            ['name' => 'Puthuk Budug Asu',  'region' => 'East Java', 'mdpl' => 1422, 'meeting_point' => 'Lawang'],
            ['name' => 'Puthuk Siwur',      'region' => 'East Java', 'mdpl' => 1429, 'meeting_point' => 'Mojokerto'],
            ['name' => 'Mt. Tanggung',      'region' => 'East Java', 'mdpl' => 1458, 'meeting_point' => 'Pasuruan'],
            ['name' => 'Mt. Jabal',         'region' => 'East Java', 'mdpl' => 1470, 'meeting_point' => 'Malang'],
            ['name' => 'Puthuk Gragal',     'region' => 'East Java', 'mdpl' => 1480, 'meeting_point' => 'Mojokerto'],
            ['name' => 'Mt. Pundak',        'region' => 'East Java', 'mdpl' => 1585, 'meeting_point' => 'Mojokerto'],
            ['name' => 'Mt. Lincing',       'region' => 'East Java', 'mdpl' => 1860, 'meeting_point' => 'Lawang'],
        ];

        foreach ($mountains as $mountainData) {
            $destination = Destination::create([
                ...$mountainData,
                'destination_category_id' => '1',
                'description' => $mountainData['name'] . ' is one of the notable mountains in East Java.'
            ]);

            // Create 3 sample images per mountain
            for ($i = 1; $i <= 3; $i++) {
                DestinationImage::create([
                    'destination_id' => $destination->id,
                    'image_path' => 'mountains/sample-' . strtolower(str_replace([' ', '.'], '-', $destination->name)) . '-' . $i . '.jpg'
                ]);
            }
        }
    }
}
