<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDropPrevRiwayatFromRegister extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('register', function($table) {
            $table->dropColumn('reg_history_visit');
            $table->dropColumn('reg_kunjunganluarnegri');
            $table->dropColumn('reg_kontakterakhir');
         });
     
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('register', function($table) {
            $table->string('reg_history_visit');
            $table->string('reg_kunjunganluarnegri');
            $table->string('reg_kontakterakhir');
         });
    }
}