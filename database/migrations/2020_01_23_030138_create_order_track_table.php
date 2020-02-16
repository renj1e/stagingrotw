<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTrackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_track', function (Blueprint $table) {
            $table->bigIncrements('order_trackid');
            $table->integer('order_trackcustomerid');
            $table->integer('order_track_riderid')->nullable();
            $table->json('order_trackorderid');
            $table->integer('order_trackdelivery_addressid');
            $table->enum('order_trackstatus', ['oncart', 'onwishlist', 'order_confirmed_and_received', 'processing', 'purchased', 'otw', 'delivered']);
            $table->longText('order_trackremarks');
            $table->string('order_tracksched_date');
            $table->softDeletes();
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
        Schema::dropIfExists('order_track');
    }
}
