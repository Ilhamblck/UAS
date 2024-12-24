<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absen extends Model
{
    use HasFactory;

    protected $table = 'absensi';

    protected $fillable = ['guru_id', 'mata_pelajaran_id','murid_id', 'tanggal','jam' ,'masuk'];

    public function murid()
    {
        return $this->belongsTo(Murid::class, 'murid_id');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }

    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class, 'mata_pelajaran_id');
    }

    public function guruSummary()
    {
        return $this->belongsTo(GuruSummary::class, 'guru_id', 'guru_id');
    }
}
