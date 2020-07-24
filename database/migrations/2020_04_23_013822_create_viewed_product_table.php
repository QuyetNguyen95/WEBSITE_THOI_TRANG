<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewedProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viewed_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('vp_product_id')->default(0);
            $table->integer('vp_user_id')->default(0);
            //mỗi sản phẫm đã xem một lần
            $table->unique(['vp_product_id','vp_user_id']);
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
        Schema::dropIfExists('viewed_product');
    }
}
