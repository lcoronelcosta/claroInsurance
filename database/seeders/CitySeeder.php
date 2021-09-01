<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = new City();
        $city->state_id = 1;
        $city->nombre = 'Guayaquil';
        $city->save();

        $city = new City();
        $city->state_id = 1;
        $city->nombre = 'Nobol';
        $city->save();

        $city = new City();
        $city->state_id = 1;
        $city->nombre = 'Daule';
        $city->save();

        $city = new City();
        $city->state_id = 2;
        $city->nombre = 'Chone';
        $city->save();

        $city = new City();
        $city->state_id = 2;
        $city->nombre = 'El Carmen';
        $city->save();

        $city = new City();
        $city->state_id = 2;
        $city->nombre = 'Prueba de Ciudad';
        $city->save();
    }
}
