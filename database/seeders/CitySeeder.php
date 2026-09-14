<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $file = fopen(__DIR__ . "/cities.csv", "r");
        if (!$file) return;
        fgetcsv($file);
        $values = fgetcsv($file);
        for (; $values; $values = fgetcsv($file))
        {
            City::insert([
                'id' => $values[0],
                'zip_code' => $values[1],
                'city' => $values[2],
                'county_id' => $values[3],
                'population' => rand(300, 1000000)
            ]);
        }
        fclose($file);
    }
}
