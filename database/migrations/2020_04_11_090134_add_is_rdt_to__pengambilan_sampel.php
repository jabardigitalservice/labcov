<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsRdtToPengambilanSampel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {  Schema::table('pengambilansampel', function (Blueprint $table) {
        $table->integer('pen_rdt')->nullable();
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
        $table->integer('pen_rdt');
     });
}

}
