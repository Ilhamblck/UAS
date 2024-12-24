<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('murid_id'); // Menambahkan kolom murid_id
            $table->unsignedBigInteger('guru_id');
            $table->unsignedBigInteger('mata_pelajaran_id');
            $table->date('tanggal');
            $table->boolean('masuk'); // 1 = masuk, 0 = tidak
            $table->foreign('murid_id')->references('id')->on('murid')->onDelete('cascade'); // Relasi ke tabel murid
            $table->foreign('guru_id')->references('id')->on('guru')->onDelete('cascade');  // Relasi ke tabel guru
            $table->foreign('mata_pelajaran_id')->references('id')->on('mata_pelajaran')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('absensi');
    }
};
