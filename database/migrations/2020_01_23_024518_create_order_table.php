<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements('orderid');
            $table->integer('ordercustomerid');
            $table->integer('ordermenuid');
            $table->json('orderaddons');
            $table->integer('orderquantity');
            $table->string('ordereta')->nullable();
            $table->enum('order_status', ['oncart', 'processing', 'delivered']);
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
        Schema::dropIfExists('order');
    }
}
