<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToPengambilan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengambilansampel', function (Blueprint $table) {
           
                $table->integer('pen_statuspen')->default('0');
     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengambilansampel', function($table) {
            $table->dropColumn('pen_statuspen');
         });
    }
}
