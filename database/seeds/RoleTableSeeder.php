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
        $role = new Role();
        $role->name = "user";
        $role->description = "can comment";
        $role->save();

        $role = new Role();
        $role->name = "administrator";
        $role->description = "can create other users and manage site";
        $role->save();

        $role = new Role();
        $role->name = "journalist";
        $role->description = "can add blog posts";
        $role->save();
    }
}
