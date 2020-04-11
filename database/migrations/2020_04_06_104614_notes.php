<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Notes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
        $table->increments('note_id');
        $table->integer('note_userid');
        $table->text('note_isi');
        $table->integer('note_item_id')->nullable();
        $table->integer('note_item_type')->nullable();
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
        Schema::dropIfExists('notes');
    }
}
