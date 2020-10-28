<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToCeritaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cerita', function (Blueprint $table) {
            $table->unsignedBigInteger('id_user')->nullable();
            $table->unsignedBigInteger('id_genre')->nullable();
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_genre')->references('id')->on('genre');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cerita', function (Blueprint $table) {
            $table->dropForeign(['id_user', 'id_genre']);
            $table->dropColumn(['id_user', 'id_genre']);
        });
    }
}
