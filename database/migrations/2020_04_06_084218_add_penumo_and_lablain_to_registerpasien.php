<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPenumoAndLablainToRegisterpasien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('register', function (Blueprint $table) {
            $table->string('reg_gejpenumonia')->nullable();
            $table->text('reg_hasillablainnya')->nullable();
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
            $table->dropColumn('reg_gejpenumonia');
            $table->dropColumn('reg_hasillablainnya');
         });
    }
}
