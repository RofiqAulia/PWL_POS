<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTPenjualanDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('t_penjualan_detail')) {
            Schema::create('t_penjualan_detail', function (Blueprint $table) {
                $table->id('detail_id');
                $table->foreignId('penjualan_id')->constrained('t_penjualan');
                $table->foreignId('barang_id')->constrained('m_barang');
                $table->integer('harga');
                $table->integer('jumlah');
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
        Schema::dropIfExists('t_penjualan_detail');
    }
}
