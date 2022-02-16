<?php

namespace Database\Seeders;

use App\Models\Manufacturer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ManufacturerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Удалим имеющиеся в таблице данные
        Manufacturer::truncate();

        $faker = \Faker\Factory::create();

        // Добавим 10 записей
        for ($i = 0; $i < 10; $i++) {
            Manufacturer::create([
                'title' => $faker->sentence,
            ]);
        }
    }
}
