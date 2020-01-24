<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddOnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addons', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('addid');
            $table->integer('addmenuid');
            $table->string('addname');
            $table->longText('adddesc');
            $table->json('addtype');
            $table->integer('addprice');
            $table->integer('addquantity');
            $table->tinyInteger('addis_activated');
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
        Schema::dropIfExists('addons');
    }
}
