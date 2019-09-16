<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug', 255)->unique();
            $table->timestamps();
        });

        Schema::create('pages_translate', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('page_id')->unsigned();
            $table->string('title', 255);
            $table->text('body')->nullable();
            $table->foreign('page_id')->references('id')->on('pages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pages_translate', function(Blueprint $table) {
            $table->dropForeign(['page_id']);
        });
        Schema::dropIfExists('pages_translate');
        Schema::dropIfExists('pages');
    }
}
