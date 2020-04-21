<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteRapid2OnPencatatanrapid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pencatatanrapid', function($table) {
            $table->dropColumn('rapid_tanggal_rdt_2')->nullable();
            $table->dropColumn('rapid_jam_rdt_2')->nullable();
            $table->dropColumn('rapid_jenis_sampel_rdt_2')->nullable();
            $table->dropColumn('rapid_kesimpulan_rdt_2')->nullable();
            $table->dropColumn('rapid_igg_2')->nullable();
            $table->dropColumn('rapid_igm_2')->nullable();
            $table->dropColumn('rapid_igg_igm_2')->nullable();
            $table->dropColumn('rapid_antigen_2')->nullable();
            $table->dropColumn('rapid_catatan_2')->nullable();
            $table->tinyInteger('rapid_ke')->nullable();
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
            $table->string('rapid_tanggal_rdt_2')->nullable();
            $table->string('rapid_jam_rdt_2')->nullable();
            $table->string('rapid_jenis_sampel_rdt_2')->nullable();
            $table->string('rapid_kesimpulan_rdt_2')->nullable();
            $table->string('rapid_igg_2')->nullable();
            $table->string('rapid_igm_2')->nullable();
            $table->string('rapid_igg_igm_2')->nullable();
            $table->string('rapid_antigen_2')->nullable();
            $table->text('rapid_catatan_2')->nullable();
         });
    }
}
