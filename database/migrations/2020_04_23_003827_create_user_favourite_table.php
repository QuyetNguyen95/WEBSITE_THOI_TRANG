<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFavouriteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_favourite', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uf_product_id')->default(0);
            $table->integer('uf_user_id')->default(0);
            //một user chỉ thích 1 sản phẩm 1 lần
            $table->unique(['uf_product_id','uf_user_id']);
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
        Schema::dropIfExists('user_favourite');
    }
}
