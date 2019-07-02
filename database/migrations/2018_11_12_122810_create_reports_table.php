<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('report_type_id');
            $table->unsignedInteger('user_id');
            $table->string('title');
            $table->text('description');
            $table->unsignedInteger('state_id');
            $table->string('victim');
            $table->string('affiliation');
            $table->string('assailant');
            $table->unsignedInteger('status_id');
            $table->date('date');
            $table->unsignedInteger('views')->default(0);
            $table->timestamps();

            $table->foreign('report_type_id')->references('id')->on('report_types');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('state_id')->references('id')->on('states');

            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_bin';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
