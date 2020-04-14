<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RevisiFieldRegister140420 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('register', function (Blueprint $table) {
            $table->string('reg_gejpanas',50)->change();
            $table->string('reg_gejbatuk',50)->change();
            $table->string('reg_gejnyeritenggorokan',50)->change();
            $table->string('reg_gejsesaknafas',50)->change();
            $table->string('reg_gejpilek',50)->change();
            $table->string('reg_gejlesu',50)->change();
            $table->string('reg_gejsakitkepala',50)->change();
            $table->string('reg_gejdiare',50)->change();
            $table->string('reg_gejmualmuntah',50)->change();
            $table->string('reg_komorbidhipertensi')->change();
            $table->string('reg_komorbiddm',50)->change();
            $table->string('reg_komorbidliver',50)->change();
            $table->string('reg_komorbidneurologi',50)->change();
            $table->string('reg_komorbidhiv',50)->change();
            $table->string('reg_komorbidparu',50)->change();
            $table->string('reg_komorbidginjal',50)->change();
            $table->string('reg_pekerjaan',50)->nullable();
            $table->string('reg_tempatlahir',50)->nullable();
            $table->string('reg_kewarganegaraan')->nullable();
            $table->string('reg_nkk')->nullable();
            $table->string('reg_domisilirt',50)->nullable();
            $table->string('reg_domisilirw',50)->nullable();
            $table->text('reg_keteranganpasien')->nullable();
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
        $table->dropColumn('reg_pekerjaan')->nullable();
        $table->dropColumn('reg_tempatlahir')->nullable();
        $table->dropColumn('reg_kewarganegaraan')->nullable();
        $table->dropColumn('reg_nkk')->nullable();
        $table->dropColumn('reg_domisilirt')->nullable();
        $table->dropColumn('reg_domisilirw')->nullable();
        $table->dropColumn('reg_keteranganpasien')->nullable();
     });
}
}
