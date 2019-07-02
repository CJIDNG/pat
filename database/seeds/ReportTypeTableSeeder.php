<?php

use Illuminate\Database\Seeder;
use App\ReportType;

class ReportTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reportType = new ReportType();
        $reportType->name = "Physical Attack";
        $reportType->save();

        $reportType = new ReportType();
        $reportType->name = "Arrest";
        $reportType->save();

        $reportType = new ReportType();
        $reportType->name = "Border Stop";
        $reportType->save();

        $reportType = new ReportType();
        $reportType->name = "Equipment Search Or Seizure";
        $reportType->save();

        $reportType = new ReportType();
        $reportType->name = "Equipment or Property Damage";
        $reportType->save();

        $reportType = new ReportType();
        $reportType->name = "Denial Of Access";
        $reportType->save();

        $reportType = new ReportType();
        $reportType->name = "Threat";
        $reportType->save();

        $reportType = new ReportType();
        $reportType->name = "Harassment";
        $reportType->save();
    }
}
