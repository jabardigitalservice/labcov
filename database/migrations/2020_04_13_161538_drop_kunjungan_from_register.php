<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropKunjunganFromRegister extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('register', function($table) {
            $table->dropColumn('reg_tanggalkunjungan1');
            $table->dropColumn('reg_rsfasyankes1');
            $table->dropColumn('reg_tanggalkunjungan2');
            $table->dropColumn('reg_rsfasyankes2');
            $table->dropColumn('reg_tanggalkunjungan3');
            $table->dropColumn('reg_rsfasyankes3');
            $table->dropColumn('reg_tanggalkunjungan4');
            $table->dropColumn('reg_rsfasyankes4');
            $table->dropColumn('reg_tanggalkunjungan5');
            $table->dropColumn('reg_rsfasyankes5');
            $table->dropColumn('reg_tanggalkunjungan6');
            $table->dropColumn('reg_rsfasyankes6');
            $table->dropColumn('reg_tanggalkunjungan7');
            $table->dropColumn('reg_rsfasyankes7');
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
            $table->date('reg_tanggalkunjungan1')->nullable();
            $table->string('reg_rsfasyankes1')->nullable();
            $table->date('reg_tanggalkunjungan2')->nullable();
            $table->string('reg_rsfasyankes2')->nullable();
            $table->date('reg_tanggalkunjungan3')->nullable();
            $table->string('reg_rsfasyankes3')->nullable();
            $table->date('reg_tanggalkunjungan4')->nullable();
            $table->string('reg_rsfasyankes4')->nullable();
            $table->date('reg_tanggalkunjungan5')->nullable();
            $table->string('reg_rsfasyankes5')->nullable();
            $table->date('reg_tanggalkunjungan6')->nullable();
            $table->string('reg_rsfasyankes6')->nullable();
            $table->date('reg_tanggalkunjungan7')->nullable();
            $table->string('reg_rsfasyankes7')->nullable();
         });
    }
}
