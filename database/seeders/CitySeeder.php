<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            ['cityName'=> 'Jakarta'],
            ['cityName'=> 'Surabaya'],
            ['cityName'=> 'Bandung'],
            ['cityName'=> 'Semarang'],
            ['cityName'=> 'Medan'],
            ['cityName'=> 'Makasar'],
            ['cityName'=> 'Palembang']

        ];

        foreach($cities as $city){
            City::create($city);
        }
    }
}
