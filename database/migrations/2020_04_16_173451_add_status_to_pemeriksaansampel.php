<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToPemeriksaansampel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pemeriksaansampel', function (Blueprint $table) {
            $table->tinyInteger('pem_status')->default(1)->nullable();
    });
}

/**
 * Reverse the migrations.
 *
 * @return void
 */
public function down()
{
    Schema::table('pemeriksaansampel', function($table) {
        $table->dropColumn('pem_status');
     });
}
}
