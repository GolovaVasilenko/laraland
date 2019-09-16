<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('idName', 255)->nullable();
            $table->string('className', 255)->nullable();
            $table->string('type', 255);
            $table->timestamps();
        });

        Schema::create('sections_translate', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('section_id')->unsigned();
            $table->string('lang', 5);
            $table->text('data');
            $table->timestamps();
            $table->foreign('section_id')
                ->references('id')
                ->on('sections')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sections_translate', function(Blueprint $table) {
            $table->dropForeign(['section_id']);
        });
        Schema::dropIfExists('sections_translate');
        Schema::dropIfExists('sections');
    }
}
