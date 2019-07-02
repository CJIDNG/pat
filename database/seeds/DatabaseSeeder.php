<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(ReportTypeTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(StateTableSeeder::class);
    }
}
