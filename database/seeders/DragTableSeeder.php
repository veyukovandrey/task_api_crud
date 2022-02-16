<?php

namespace Database\Seeders;

use App\Models\Drag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DragTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Удалим имеющиеся в таблице данные
        Drag::truncate();

        $faker = \Faker\Factory::create();

        // Добавим 5 записей
        for ($i = 0; $i < 5; $i++) {
            Drag::create([
                'title' => $faker->sentence,
                'substance_id' => $faker->numberBetween(1,5),
                'manufacturer_id' => $faker->numberBetween(1,5),
                'price' => $faker->randomFloat(2, 0, 10000),
            ]);
        }
    }
}
