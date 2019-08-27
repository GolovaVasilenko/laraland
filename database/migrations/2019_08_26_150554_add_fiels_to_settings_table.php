<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFielsToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('group', 150)->nullable();
            $table->string('label', 255)->nullable();
            $table->string('type', 100)->nullable();
            $table->string('lang', 5)->default('ru');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('group');
            $table->dropColumn('label');
            $table->dropColumn('type');
            $table->dropColumn('lang');
        });
    }
}
