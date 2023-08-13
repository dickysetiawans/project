<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryGadaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_gadais', function (Blueprint $table) {
            $table->id();
            $table->integer('no_transaksi')->unique();
            $table->string('tipe_barang');
            $table->string('merk');
            $table->string('nama_barang');
            $table->string('attribut');
            $table->integer('nominal');
            $table->string('lokasi_outlet');
            $table->date('tgl_gadai');
            $table->date('tgl_jatuh_tempo');
            $table->string('status');
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
        Schema::dropIfExists('history_gadais');
    }
}
