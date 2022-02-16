<?php

namespace Database\Seeders;

use App\Models\Substance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubstanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Удалим имеющиеся в таблице данные
        Substance::truncate();

        $faker = \Faker\Factory::create();

        // Добавим 10 записей
        for ($i = 0; $i < 10; $i++) {
            Substance::create([
                'title' => $faker->sentence,
            ]);
        }
    }
}
