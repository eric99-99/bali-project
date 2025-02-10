<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id')->nullable(false)->unsigned();
            $table->string('company_name', 50)->nullable(false);
            $table->date('start_date', 25)->nullable(false);
            $table->date('end_date', 25)->nullable();
            $table->text('job_description')->nullable(false);
        });
        Schema::table('experiences', function($table) {
            $table->foreign('employee_id')->references('id')->on('employees');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiences');
    }
}
