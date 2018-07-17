<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = 'Admin';
        $role_admin->description = 'A Administrator Admin';
        $role_admin->save();

        $role_leader = new Role();
        $role_leader->name = 'Leader';
        $role_leader->description = 'A Leader Admin';
        $role_leader->save();

        $role_teacher = new Role();
        $role_teacher->name = 'Teacher';
        $role_teacher->description = 'A Manager Admin';
        $role_teacher->save();
    }
}
