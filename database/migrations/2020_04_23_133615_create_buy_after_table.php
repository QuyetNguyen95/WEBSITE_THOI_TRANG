<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyAfterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_after', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ba_product_id')->default(0);
            $table->integer('ba_user_id')->default(0);
            $table->unique(['ba_product_id','ba_user_id']);
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
        Schema::dropIfExists('buy_after');
    }
}
