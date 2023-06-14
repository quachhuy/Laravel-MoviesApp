<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Flight;

class FlightTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for($i=1;$i<100;$i++){
            FLight::create([
                'Aircraft_ID' => $faker->randomElement(['A320','A321','A330','A350','A380']),
                'Departure_Airport' => $faker ->randomElement(['Ha Noi','HCM','Da Nang','Dong Nai','Hai Phong','Quang Ninh','Hue']),
                'Arrival_Airport' => $faker ->randomElement(['Ha Noi','HCM','Da Nang','Dong Nai','Hai Phong']),
                'Departure_Time' => $faker->datetime(),
                'Arrival_Time' => $faker->datetime(),
                'Flight_Duration' => $faker->time()
            ]);
        }
    }
}
