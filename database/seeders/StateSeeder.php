<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $state = new State();
        $state->country_id = 1;
        $state->nombre = 'Guayas';
        $state->save();

        $state = new State();
        $state->country_id = 1;
        $state->nombre = 'Manabi';
        $state->save();

        $state = new State();
        $state->country_id = 2;
        $state->nombre = 'Antioquia';
        $state->save();

        $state = new State();
        $state->country_id = 2;
        $state->nombre = 'Bolivar';
        $state->save();

        $state = new State();
        $state->country_id = 3;
        $state->nombre = 'Amazonas';
        $state->save();

        $state = new State();
        $state->country_id = 3;
        $state->nombre = 'Arequipa';
        $state->save();
    }
}
