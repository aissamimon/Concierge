<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'Admin';
        $role->description = 'Administrator';
        $role->save();

        $role = new Role();
        $role->name = 'Staff';
        $role->description = 'Staff';
        $role->save();
    }
}
