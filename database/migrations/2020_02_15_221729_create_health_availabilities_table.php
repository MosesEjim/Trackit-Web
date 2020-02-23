<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthAvailabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_availabilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('facility_id');
            $table->string('name_of_data_collector');
            $table->string('no_of_usable_RTUF');
            $table->boolean('usable_RTUF');
            $table->boolean('expired_RTUF');
            $table->boolean('damaged_RTUF');
            $table->integer('no_of_damaged_RTUF');
            $table->boolean('sc_available');
            $table->boolean('complete_sc_record');
            $table->integer('stock_out_days');
            $table->boolean('dispensed_RTUF_record');
            $table->boolean('record_of_distributed_RTUF');
            $table->integer('no_of_dispensed_RTUF');
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
        Schema::dropIfExists('health_availabilities');
    }
}
