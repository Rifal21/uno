<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('daftars', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('noKK');
            $table->string('NIK');
            $table->string('kontingen');
            $table->string('nama_pelatih');
            $table->string('email');
            $table->bigInteger('nohp');
            $table->integer('berat_badan');
            $table->string('gender');
            $table->string('foto');
            $table->foreignId('id_kategori');
            $table->foreignId('id_kelas');
            $table->string('bukti_pembayaran')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftars');
    }
};
