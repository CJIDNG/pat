<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = new Status();
        $status->name = "Draft";
        $status->save();

        $status = new Status();
        $status->name = "Submitted";
        $status->save();

        $status = new Status();
        $status->name = "Approved";
        $status->save();

        $status = new Status();
        $status->name = "Unverified";
        $status->save();

        $status = new Status();
        $status->name = "Verified";
        $status->save();
    }
}
