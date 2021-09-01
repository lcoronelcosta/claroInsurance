<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country = new Country();
        $country->nombre = 'Ecuador';
        $country->save();

        $country = new Country();
        $country->nombre = 'Colombia';
        $country->save();
        
        $country = new Country();
        $country->nombre = 'Peru';
        $country->save();

        $country = new Country();
        $country->nombre = 'Venezuela';
        $country->save();

        $country = new Country();
        $country->nombre = 'Chile';
        $country->save();
    }
}
