<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsRdtToValidasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('validasi', function (Blueprint $table) {
             $table->tinyInteger('val_is_rapid')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('validasi', function (Blueprint $table) {
            $table->dropColumn('val_is_rapid');
        });
    }
}
