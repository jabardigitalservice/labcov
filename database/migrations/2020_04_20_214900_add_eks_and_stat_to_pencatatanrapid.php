<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEksAndStatToPencatatanrapid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pencatatanrapid', function (Blueprint $table) {
            $table->tinyInteger('rapid_status')->default(1)->nullable();
            $table->tinyInteger('rapid_penid')->nullable();
    });
}

/**
 * Reverse the migrations.
 *
 * @return void
 */
public function down()
{
    Schema::table('pencatatanrapid', function($table) {
        $table->dropColumn('rapid_status');
        $table->dropColumn('rapid_penid');
     });
    }
}
