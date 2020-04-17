<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Validasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('validasi', function (Blueprint $table) {
            $table->increments('val_id');
            $table->integer('val_pemid');
            $table->integer('val_samid');
            $table->integer('val_noreg');
            $table->string('val_ttd');
            $table->date('val_date_print')->nullable();
            $table->string('val_file')->nullable();
            $table->integer('val_userid')->nullable();
            $table->integer('val_status')->nullable();
            $table->timestamps();
            
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('validasi');
    }
}
