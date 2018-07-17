<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'Admin')->first();
        $role_leader  = Role::where('name', 'Leader')->first();
        $role_teacher  = Role::where('name', 'Teacher')->first();

        $admin = new Admin();
        $admin->name = 'Admin';
        $admin->email = 'admin@admin.com';
        $admin->password = bcrypt('secret');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $leader = new Admin();
        $leader->name = 'Leader';
        $leader->email = 'leader@admin.com';
        $leader->password = bcrypt('secret');
        $leader->save();
        $leader->roles()->attach($role_leader);

        $teacher = new Admin();
        $teacher->name = 'Teacher';
        $teacher->email = 'teacher@admin.com';
        $teacher->password = bcrypt('secret');
        $teacher->save();
        $teacher->roles()->attach($role_teacher);
    }
}
