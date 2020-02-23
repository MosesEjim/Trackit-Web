<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthUsagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_usages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_of_data_collector');
            $table->Integer('protocol_book');
            $table->boolean('describe_dosage1');
            $table->boolean('describe_dosage2');
            $table->boolean('describe_dosage3');
            $table->boolean('seller_at_home');
            $table->integer('frequency_of_distribution');
            $table->integer('no_of_patient_charts');
            $table->integer('child_weight');
            $table->integer('sachets_dispensed');
            $table->integer('patient_entries_reviewed');
            $table->integer('child_weight_in_kg');
            $table->integer('days_in_treatment');
            $table->boolean('child_recovered');
            $table->boolean('child_transfered');
            $table->boolean('final_weight_in_kg');
            $table->string('facility_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('health_usages');
    }
}
