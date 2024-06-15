<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTPenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('t_penjualan')) {
            Schema::create('t_penjualan', function (Blueprint $table) {
                $table->id('penjualan_id');
                $table->foreignId('user_id')->constrained('m_user');
                $table->string('pembeli', 50);
                $table->string('penjualan_kode', 20);
                $table->dateTime('penjualan_tanggal');
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
        Schema::dropIfExists('t_penjualan');
    }
}
