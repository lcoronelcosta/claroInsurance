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
        $user->email = 'lufecoro@outlook.com';
        $user->password = bcrypt('admin');
        $user->name = 'Administrador';
        $user->num_mobile = '0969458949';
        $user->ci = '0969458949';
        $user->dateNac = '1992-07-24';
        $user->cod_city = '0001';
        $user->save();

        $user = new User();
        $user->role_id = 2;
        $user->email = 'user@outlook.com';
        $user->password = bcrypt('admin');
        $user->name = 'Usuario Final';
        $user->num_mobile = '0969458949';
        $user->ci = '0969458949';
        $user->dateNac = '1992-07-24';
        $user->cod_city = '0001';
        $user->save();
    }
}
