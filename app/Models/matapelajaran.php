<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matapelajaran extends Model
{
    use HasFactory;

    protected $table = 'mata_pelajaran';

    protected $fillable = [
        'nama_mata_pelajaran',
    ];

    public function absen()
    {
        return $this->hasMany(Absen::class, 'mata_pelajaran_id');
    }
}
