<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSCQuestionairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_c_questionaires', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('facility_id');
            $table->string('name_of_data_collector');
            $table->boolean('products_damaged');
            $table->boolean('rodent_in_store');
            $table->boolean('properly_stored');
            $table->boolean('protected_from_sun');
            $table->boolean('dry_store');
            $table->boolean('stored_away_from_insects');
            $table->boolean('off_the_floor');
            $table->boolean('expired_commodity');
            $table->boolean('properly_stacked');
            $table->boolean('identification_label');
            $table->boolean('proper_temperature');
            $table->boolean('secured_storage');
            $table->boolean('fire_safety_equipment');
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
        Schema::dropIfExists('s_c_questionaires');
    }
}
