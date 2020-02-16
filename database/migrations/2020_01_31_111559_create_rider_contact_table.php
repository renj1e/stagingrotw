<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiderContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rider_contact', function (Blueprint $table) {
            $table->bigIncrements('rider_contact_id');
            $table->integer('rider_contact_rider_id');
            $table->enum('rider_contact_type', ['facebook', 'instagram', 'landline', 'mobile']);
            $table->string('rider_contact_number');
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
        Schema::dropIfExists('rider_contact');
    }
}
