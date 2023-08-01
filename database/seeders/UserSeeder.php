<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i=0; $i < 10 ; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'image'=>'3bp2FMGMwr3OqmMKSo9KDRutE3Wl9WAtaUARcnSj.png',
                'bayar'=>mt_rand(100000,125000),
                'price'=>mt_rand(100000,125000),
                'linkedin'=> $faker->sentence,
                'phoneNumber'=> $faker->phoneNumber,
                'city_id'=>mt_rand(1,7),
                'prof1'=>mt_rand(1,7),
                'prof2'=>mt_rand(1,7),
                'prof3'=>mt_rand(1,7),
                'password'=>$faker->password,
                'gender'=>mt_rand(0,1)
            ]);
        }
    }
}
