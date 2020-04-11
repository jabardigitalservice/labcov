<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusSampel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sampel', function (Blueprint $table) {
            $table->integer('sam_statussam')->nullable();
            $table->integer('sam_possam')->nullable();
            $table->integer('sam_userid')->nullable();
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sampel', function($table) {
            $table->dropColumn('sam_statussam');
            $table->dropColumn('sam_possam');
            $table->dropColumn('sam_userid');
         });
    }
}
