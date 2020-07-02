<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
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
            $table->string('a_description')->index();
            $table->string('a_content')->index();
            $table->string('a_title_seo')->nullable();
            $table->string('a_description_seo')->nullable();
            $table->string('a_avatar')->nullable();
            $table->string('a_slug')->index();
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
