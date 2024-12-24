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
        Schema::create('guru_summary', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('guru_id');
            $table->unsignedBigInteger('mata_pelajaran_id');
            $table->integer('total_absensi'); // jumlah total absensi per bulan
            $table->integer('gaji');
            $table->integer('hasil'); // total_absensi * gaji
            $table->foreign('guru_id')->references('id')->on('guru')->onDelete('cascade');
            $table->foreign('mata_pelajaran_id')->references('id')->on('mata_pelajaran')->onDelete('cascade');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     */
    public function down()
    {
        Schema::dropIfExists('guru_summary');
    }

    
};


//------------------------------------------------- kode trigger untuk view gabungan ---------------------------------------// sqlyog
// /** 
// DELIMITER $$

// CREATE TRIGGER after_absensi_insert
// AFTER INSERT ON absensi
// FOR EACH ROW
// BEGIN
//     -- Update total absensi dan hasil di tabel guru_summary
//     DECLARE total_absensi INT;
//     DECLARE gaji DECIMAL(10,2);

//     -- Menghitung total absensi (jumlah masuk) per guru dan mata pelajaran
//     SELECT COUNT(*) INTO total_absensi 
//     FROM absensi 
//     WHERE guru_id = NEW.guru_id 
//       AND mata_pelajaran_id = NEW.mata_pelajaran_id 
//       AND masuk = 1 
//       AND DATE_FORMAT(tanggal, '%Y-%m') = DATE_FORMAT(NOW(), '%Y-%m');

//     -- Mengambil gaji dari tabel guru
//     SELECT gaji_perbulan INTO gaji 
//     FROM guru 
//     WHERE id = NEW.guru_id;

//     -- Menyimpan atau memperbarui data di tabel guru_summary
//     INSERT INTO guru_summary (guru_id, mata_pelajaran_id, total_absensi, gaji, hasil, created_at, updated_at)
//     VALUES (NEW.guru_id, NEW.mata_pelajaran_id, total_absensi, gaji, total_absensi * gaji, NOW(), NOW())
//     ON DUPLICATE KEY UPDATE
//         total_absensi = total_absensi,
//         gaji = gaji,
//         hasil = total_absensi * gaji,
//         updated_at = NOW();
// END$$

// DELIMITER ;

// */
