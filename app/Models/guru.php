<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    use HasFactory;

    protected $table = 'guru';

    protected $fillable = [
        'nama_guru',
        'alamat',
        'no_hp',
    ];

    public function mataPelajaran()
    {
        return $this->hasMany(MataPelajaran::class, 'guru_id');
    }

    public function gaji()
    {
        return $this->hasMany(Gaji::class, 'guru_id');
    }

    public function guruSummary()
    {
        return $this->hasMany(GuruSummary::class, 'guru_id');
    }
}
