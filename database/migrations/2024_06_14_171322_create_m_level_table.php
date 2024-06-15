<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMLevelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Check if the table exists before creating it
        if (!Schema::hasTable('m_level')) {
            Schema::create('m_level', function (Blueprint $table) {
                $table->id('level_id');
                $table->string('level_kode', 10)->unique();
                $table->string('level_nama', 100);
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
        Schema::dropIfExists('m_level');
    }
}
