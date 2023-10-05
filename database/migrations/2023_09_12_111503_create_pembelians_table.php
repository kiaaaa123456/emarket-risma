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
        Schema::create('pembelian', function (Blueprint $table) {
            $table->string('id');
            $table->string('kode_masuk', 50);
            $table->string('kode_barang', 50);
            $table->string('nama_barang');
            $table->string('qty');
            $table->double('total');
            $table->string('action');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('update_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
        // $table->foreign('pemasok_id')->references('id')->on('pemasok')->onUpdate
            // ('cascade')->onDelete('cascade');
            // $table->foreign('user_id')->references('id')->on('users')->onUpdate
            // ('cascade')->onDelete('cascade');
            // $table->index('pemasok_id', 'user_id');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembelian');
    }
};
