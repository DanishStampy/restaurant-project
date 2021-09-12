<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ReservationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1, 20) as $index){
            DB::table('reservations')->insert([
                'name' => $faker->name(),
                'email' => $faker->safeEmail(),
                'phone' => $faker->phoneNumber(),
                'guest' => $faker->numberBetween(1,10),
                'date' => $faker->date('d.m.Y'),
                'time' => $faker->time('H.i'),
                'message' => $faker->paragraph()
            ]);
        }
    }
}
