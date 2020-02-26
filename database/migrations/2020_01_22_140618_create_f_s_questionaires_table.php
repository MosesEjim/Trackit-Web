<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFSQuestionairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('f_s_questionaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('facility_id');
            $table->string('name_of_data_collector');
            $table->Integer('protocol_book');
            $table->boolean('describe_dosage1');
            $table->boolean('describe_dosage2');
            $table->boolean('describe_dosage3');
            $table->boolean('seller_at_home');
            $table->integer('frequency_of_distribution');
            $table->integer('no_of_patient_charts');
            $table->integer('sachets_dispensed');
            $table->integer('patient_entries_reviewed');
            $table->integer('child_weight_in_kg');
            $table->integer('days_in_treatment');
            $table->boolean('child_recovered');
            $table->boolean('child_transfered');
            $table->string('final_weight_in_kg');
            $table->double('longitude');
            $table->double('latitude');
            $table->string('lga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('f_s_questionaires');
    }
}
