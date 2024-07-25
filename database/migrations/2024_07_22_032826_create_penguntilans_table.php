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
        Schema::create('penguntilans', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_karyawan');
            $table->string('jenis_pupuk');
            $table->integer('pecahan_pupuk');
            $table->integer('jumlah');
            $table->unsignedBigInteger('user_id'); // Menggunakan unsignedBigInteger
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Tambahkan onDelete jika diperlukan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penguntilans');
    }
};
