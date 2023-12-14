<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb_transaksi', function (Blueprint $table) {
            $table->id();
            $table->string('no_transaksi');
            $table->date('tgl_transaksi')->nullable();
            $table->string('namapelanggan')->nullable();
            $table->unsignedBigInteger('id_barang')->nullable(); // Menggunakan unsignedBigInteger
            $table->unsignedBigInteger('id_jenis')->nullable();  // Menggunakan unsignedBigInteger
            $table->integer('kuantitas')->nullable();
            $table->bigInteger('total_bayar')->nullable();
            $table->timestamps();
           
            // Mengatur foreign key untuk id_barang
            $table->foreign('id_barang')
            ->references('id')
            ->on('tb_barang')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            // Mengatur foreign key untuk id_jenis
            $table->foreign('id_jenis')
            ->references('id')
            ->on('tb_jenisbrg')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_transaksi');
    }
};
