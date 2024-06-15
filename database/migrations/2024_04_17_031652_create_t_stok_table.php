<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTStokTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('t_stok')) {
            Schema::create('t_stok', function (Blueprint $table) {
                $table->id('stok_id');
                $table->foreignId('barang_id')->constrained('m_barang');
                $table->foreignId('user_id')->constrained('m_user');
                $table->dateTime('stok_tanggal');
                $table->integer('stok_jumlah');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_stok');
    }
}
