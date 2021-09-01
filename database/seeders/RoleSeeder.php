<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->nombre = 'admin';
        $role->descripcion = 'Administrator';
        $role->save();

        $role = new Role();
        $role->nombre = 'user';
        $role->descripcion = 'Usuario Final';
        $role->save();
    }
}
