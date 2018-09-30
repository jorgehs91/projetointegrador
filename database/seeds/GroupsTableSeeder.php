<?php

use Illuminate\Database\Seeder;
use App\Groups;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            App\Groups::create([
                'nome' => $faker->title,
                'descricao' => $faker->paragraph
            ]);
        }
    }
}
