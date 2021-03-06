<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToRegister extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //membuat status register 
    {
        Schema::table('register', function (Blueprint $table) {
                $table->integer('reg_statusreg')->nullable();
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
            $table->dropColumn('reg_statusreg');
         });
    }
}
