<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Add3RiwayatKeRegister extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('register', function (Blueprint $table) {
            $table->date('reg_tanggalkunjungan1')->nullable();
            $table->string('reg_rsfasyankes1')->nullable();
            
            $table->date('reg_tanggalkunjungan2')->nullable();
            $table->string('reg_rsfasyankes2')->nullable();

            $table->date('reg_tanggalkunjungan3')->nullable();
            $table->string('reg_rsfasyankes3')->nullable();

            $table->date('reg_tanggalkunjungan4')->nullable();
            $table->string('reg_rsfasyankes4')->nullable();

            $table->date('reg_tanggalkunjungan5')->nullable();
            $table->string('reg_rsfasyankes5')->nullable();

            $table->date('reg_tanggalkunjungan6')->nullable();
            $table->string('reg_rsfasyankes6')->nullable();

            $table->date('reg_tanggalkunjungan7')->nullable();
            $table->string('reg_rsfasyankes7')->nullable();

            $table->date('reg_tanggalkunjungan_pasien1')->nullable();
            $table->string('reg_kotakunjungan_pasien1')->nullable();
            $table->string('reg_negarakunjungan_pasien1')->nullable();

            $table->date('reg_tanggalkunjungan_pasien2')->nullable();
            $table->string('reg_kotakunjungan_pasien2')->nullable();
            $table->string('reg_negarakunjungan_pasien2')->nullable();
            
            $table->date('reg_tanggalkunjungan_pasien3')->nullable();
            $table->string('reg_kotakunjungan_pasien3')->nullable();
            $table->string('reg_negarakunjungan_pasien3')->nullable();
            
            $table->date('reg_tanggalkunjungan_pasien4')->nullable();
            $table->string('reg_kotakunjungan_pasien4')->nullable();
            $table->string('reg_negarakunjungan_pasien4')->nullable();
            
            $table->date('reg_tanggalkunjungan_pasien5')->nullable();
            $table->string('reg_kotakunjungan_pasien5')->nullable();
            $table->string('reg_negarakunjungan_pasien5')->nullable();
            
            $table->date('reg_tanggalkunjungan_pasien6')->nullable();
            $table->string('reg_kotakunjungan_pasien6')->nullable();
            $table->string('reg_negarakunjungan_pasien6')->nullable();
            
            $table->date('reg_tanggalkunjungan_pasien7')->nullable();
            $table->string('reg_kotakunjungan_pasien7')->nullable();
            $table->string('reg_negarakunjungan_pasien7')->nullable();
            
            

            $table->string('reg_namakon1')->nullable();
            $table->string('reg_alamatkon1')->nullable();
            $table->string('reg_hubungankon1')->nullable();
            $table->date('reg_tanggalkonawal1')->nullable();
            $table->date('reg_tanggalkonakhir1')->nullable();
            
            $table->string('reg_namakon2')->nullable();
            $table->string('reg_alamatkon2')->nullable();
            $table->string('reg_hubungankon2')->nullable();
            $table->date('reg_tanggalkonawal2')->nullable();
            $table->date('reg_tanggalkonakhir2')->nullable();
            
            $table->string('reg_namakon3')->nullable();
            $table->string('reg_alamatkon3')->nullable();
            $table->string('reg_hubungankon3')->nullable();
            $table->date('reg_tanggalkonawal3')->nullable();
            $table->date('reg_tanggalkonakhir3')->nullable();

            $table->string('reg_namakon4')->nullable();
            $table->string('reg_alamatkon4')->nullable();
            $table->string('reg_hubungankon4')->nullable();
            $table->date('reg_tanggalkonawal4')->nullable();
            $table->date('reg_tanggalkonakhir4')->nullable();

            $table->string('reg_namakon5')->nullable();
            $table->string('reg_alamatkon5')->nullable();
            $table->string('reg_hubungankon5')->nullable();
            $table->date('reg_tanggalkonawal5')->nullable();
            $table->date('reg_tanggalkonakhir5')->nullable();

            $table->string('reg_namakon6')->nullable();
            $table->string('reg_alamatkon6')->nullable();
            $table->string('reg_hubungankon6')->nullable();
            $table->date('reg_tanggalkonawal6')->nullable();
            $table->date('reg_tanggalkonakhir6')->nullable();

            $table->string('reg_namakon7')->nullable();
            $table->string('reg_alamatkon7')->nullable();
            $table->string('reg_hubungankon7')->nullable();
            $table->date('reg_tanggalkonawal7')->nullable();
            $table->date('reg_tanggalkonakhir7')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('register', function (Blueprint $table) {
            $table->dropColumn('reg_tanggalkunjungan1')->nullable();
            $table->dropColumn('reg_rsfasyankes1')->nullable();
            
            $table->dropColumn('reg_tanggalkunjungan2')->nullable();
            $table->dropColumn('reg_rsfasyankes2')->nullable();

            $table->dropColumn('reg_tanggalkunjungan3')->nullable();
            $table->dropColumn('reg_rsfasyankes3')->nullable();

            $table->dropColumn('reg_tanggalkunjungan4')->nullable();
            $table->dropColumn('reg_rsfasyankes4')->nullable();

            $table->dropColumn('reg_tanggalkunjungan5')->nullable();
            $table->dropColumn('reg_rsfasyankes5')->nullable();

            $table->dropColumn('reg_tanggalkunjungan6')->nullable();
            $table->dropColumn('reg_rsfasyankes6')->nullable();

            $table->dropColumn('reg_tanggalkunjungan7')->nullable();
            $table->dropColumn('reg_rsfasyankes7')->nullable();

            $table->dropColumn('reg_tanggalkunjungan8')->nullable();
            $table->dropColumn('reg_rsfasyankes8')->nullable();


            $table->dropColumn('reg_tanggalkunjungan1')->nullable();
            $table->dropColumn('reg_kotakunjungan1')->nullable();
            $table->dropColumn('reg_negarakunjungan1')->nullable();

            $table->dropColumn('reg_tanggalkunjungan2')->nullable();
            $table->dropColumn('reg_kotakunjungan2')->nullable();
            $table->dropColumn('reg_negarakunjungan2')->nullable();
            
            $table->dropColumn('reg_tanggalkunjungan3')->nullable();
            $table->dropColumn('reg_kotakunjungan3')->nullable();
            $table->dropColumn('reg_negarakunjungan3')->nullable();
            
            $table->dropColumn('reg_tanggalkunjungan4')->nullable();
            $table->dropColumn('reg_kotakunjungan4')->nullable();
            $table->dropColumn('reg_negarakunjungan4')->nullable();
            
            $table->dropColumn('reg_tanggalkunjungan5')->nullable();
            $table->dropColumn('reg_kotakunjungan5')->nullable();
            $table->dropColumn('reg_negarakunjungan5')->nullable();
            
            $table->dropColumn('reg_tanggalkunjungan6')->nullable();
            $table->dropColumn('reg_kotakunjungan6')->nullable();
            $table->dropColumn('reg_negarakunjungan6')->nullable();
            
            $table->dropColumn('reg_tanggalkunjungan7')->nullable();
            $table->dropColumn('reg_kotakunjungan7')->nullable();
            $table->dropColumn('reg_negarakunjungan7')->nullable();
            
            $table->dropColumn('reg_tanggalkunjungan8')->nullable();
            $table->dropColumn('reg_kotakunjungan8')->nullable();
            $table->dropColumn('reg_negarakunjungan8')->nullable();
            

            $table->dropColumn('reg_namakon1')->nullable();
            $table->dropColumn('reg_alamatkon1')->nullable();
            $table->dropColumn('reg_hubungankon1')->nullable();
            $table->dropColumn('reg_tanggalkon1')->nullable();
            
            $table->dropColumn('reg_namakon2')->nullable();
            $table->dropColumn('reg_alamatkon2')->nullable();
            $table->dropColumn('reg_hubungankon2')->nullable();
            $table->dropColumn('reg_tanggalkon2')->nullable();
            
            $table->dropColumn('reg_namakon3')->nullable();
            $table->dropColumn('reg_alamatkon3')->nullable();
            $table->dropColumn('reg_hubungankon3')->nullable();
            $table->dropColumn('reg_tanggalkon3')->nullable();

            $table->dropColumn('reg_namakon4')->nullable();
            $table->dropColumn('reg_alamatkon4')->nullable();
            $table->dropColumn('reg_hubungankon4')->nullable();
            $table->dropColumn('reg_tanggalkon4')->nullable();

            $table->dropColumn('reg_namakon5')->nullable();
            $table->dropColumn('reg_alamatkon5')->nullable();
            $table->dropColumn('reg_hubungankon5')->nullable();
            $table->dropColumn('reg_tanggalkon5')->nullable();

            $table->dropColumn('reg_namakon6')->nullable();
            $table->dropColumn('reg_alamatkon6')->nullable();
            $table->dropColumn('reg_hubungankon6')->nullable();
            $table->dropColumn('reg_tanggalkon6')->nullable();

            $table->dropColumn('reg_namakon7')->nullable();
            $table->dropColumn('reg_alamatkon7')->nullable();
            $table->dropColumn('reg_hubungankon7')->nullable();
            $table->dropColumn('reg_tanggalkon7')->nullable();

            $table->dropColumn('reg_namakon8')->nullable();
            $table->dropColumn('reg_alamatkon8')->nullable();
            $table->dropColumn('reg_hubungankon8')->nullable();
            $table->dropColumn('reg_tanggalkon8')->nullable();

            $table->dropColumn('reg_diisiolehlab')->nullable();
            
        });
    }
}
