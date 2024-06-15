
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('m_barang')) {
            Schema::create('m_barang', function (Blueprint $table) {
                $table->id('barang_id');
                $table->foreignId('kategori_id')->constrained('m_kategori');
                $table->string('barang_kode', 10)->unique();
                $table->string('barang_nama', 100);
                $table->integer('harga_beli');
                $table->integer('harga_jual');
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
        Schema::dropIfExists('m_barang');
    }
}
