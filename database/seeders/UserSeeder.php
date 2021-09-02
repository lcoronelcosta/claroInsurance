<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->role_id = 1;
        $user->email = 'admin@admin.com';
        $user->password = bcrypt('Administrador1@');
        $user->name = 'Administrador';
        $user->num_mobile = '0969458949';
        $user->ci = '0969458949';
        $user->dateNac = '1990-07-24';
        $user->city_id = 1;
        $user->save();

        $user = new User();
        $user->role_id = 2;
        $user->email = 'user@user.com';
        $user->password = bcrypt('Usuario1@');
        $user->name = 'Usuario Final';
        $user->num_mobile = '0969458949';
        $user->ci = '0969458949';
        $user->dateNac = '1992-07-24';
        $user->city_id = 2;
        $user->save();
    }
}
