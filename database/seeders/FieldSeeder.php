<?php

namespace Database\Seeders;

use App\Models\Field;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fields = [
            ['fieldName'=> 'Technologi'],
            ['fieldName'=> 'Fashion'],
            ['fieldName'=> 'Cosmetic'],
            ['fieldName'=> 'SEO'],
            ['fieldName'=> 'E-Commerce'],
            ['fieldName'=> 'Innovation'],
            ['fieldName'=> 'Education']

        ];

        foreach($fields as $f){
            Field::create($f);
        }
    }
}
