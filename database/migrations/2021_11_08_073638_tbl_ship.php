<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblShip extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_ship', function (Blueprint $table) {
            $table->Increments('ship_id');
            $table->string('ship_name');
            $table->integer('customer_id');
            $table->string('ship_address');
            $table->string('ship_phone');
            $table->string('ship_email');
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
        Schema::dropIfExists('tbl_ship');
    }
}
