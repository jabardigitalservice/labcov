<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldRevisi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('register', function (Blueprint $table) {
            $table->string('reg_kunke')->nullable();
            $table->string('reg_jenisidentitas');
            $table->date('reg_tanggalkunjungan')->nullable();
            $table->string('reg_rsfasyankes')->nullable();
            $table->string('reg_domisilikotakab')->nullable();
            $table->string('reg_domisilikecamatan')->nullable();
            $table->string('reg_domisilikelurahan')->nullable();
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
        $table->dropColumn('reg_kunke');
        $table->dropColumn('reg_tanggalkunjungan');
        $table->dropColumn('reg_rsfasyankes');
        $table->dropColumn('reg_domisilikotakab');
        $table->dropColumn('reg_domisilikecamatan');
        $table->dropColumn('reg_domisilikelurahan');
     });
}
}