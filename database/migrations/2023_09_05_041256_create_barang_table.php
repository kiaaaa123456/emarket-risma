<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id(); 
            $table->string('kode_barang',120);
            $table->unsignedBigInteger('produk_id');
            $table->string('nama_barang',120);
            $table->string('satuan',120);
            $table->double('harga_jual');
            $table->string('stok',120);
            $table->integer('ditarik');
            $table->foreign('produk_id')->references('id')->on('produk');
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
        Schema::dropIfExists('barang');
    }
};
