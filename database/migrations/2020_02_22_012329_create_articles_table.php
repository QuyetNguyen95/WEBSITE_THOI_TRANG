<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('a_name')->nullable();
            $table->string('a_slug')->nullable()->index();
            $table->tinyInteger('a_active')->default(0)->index();
            $table->tinyInteger('a_hot')->default(0)->index();
            $table->integer('a_view')->default(0);
            $table->string('a_description')->nullable();
            $table->string('a_avatar')->nullable();
            $table->string('a_description_seo')->nullable();
            $table->string('a_title_seo')->nullable();
            $table->text('a_content')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
