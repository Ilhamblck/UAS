<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruSummary extends Model
{
    use HasFactory;

    protected $table = 'guru_summary';

    protected $fillable = ['murid_id','guru_id', 'mata_pelajaran_id', 'total_absensi', 'gaji', 'hasil'];


    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }

    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'mata_pelajaran_id');
    }

    public function murid()
    {
        return $this->belongsTo(murid::class,'murid_id');
    }

    public function absensi()
{
    return $this->hasMany(absen::class, 'guru_id', 'guru_id');
}
}
