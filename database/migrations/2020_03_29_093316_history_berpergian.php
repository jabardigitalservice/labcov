  <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HistoryBerpergian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historykunjungan', function (Blueprint $table) { // history bepergian 
            $table->increments('kunid');
            $table->integer('kun_regid');
            $table->date('kun_tanggalkunjungan')->nullable();
            $table->string('kun_kotakunjungan')->nullable();
            $table->string('kun_negarakunjungan')->nullable();
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
        Schema::dropIfExists('historykunjungan');
    }
}
