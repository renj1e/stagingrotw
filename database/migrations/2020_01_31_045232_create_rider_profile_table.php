<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiderProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rider_profile', function (Blueprint $table) {
            $table->bigIncrements('rider_profile_id');
            $table->integer('rider_profile_rider_id');
            $table->longtext('rider_profile_address');
            $table->string('rider_profile_vehicle_number');
            $table->enum('rider_profile_vehicle_type', ['motorcycle', 'tricycle', 'delivery_van', 'others']);
            $table->longtext('rider_profile_drivers_license');
            $table->longtext('rider_profile_avatar');
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
        Schema::dropIfExists('rider_profile');
    }
}
