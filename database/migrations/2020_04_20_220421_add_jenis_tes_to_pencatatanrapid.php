<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJenisTesToPencatatanrapid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pencatatanrapid', function (Blueprint $table) {
            $table->tinyInteger('rapid_jenistes')->nullable();
            $table->tinyInteger('rapid_userid')->nullable();
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
        $table->dropColumn('rapid_jenistes');
        $table->dropColumn('rapid_userid');
     });
    }
}
