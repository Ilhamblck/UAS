<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class murid extends Model
{
    use HasFactory;

    protected $table = 'murid';

    protected $fillable = [
        'nama_murid',
        'alamat',
        'no_hp',
    ];

    public function absen()
    {
        return $this->hasMany(Absen::class, 'murid_id');
    }

    public function sumary()
    {
        return $this->hasMany(GuruSummary::class, 'murid_id');
    }
}
