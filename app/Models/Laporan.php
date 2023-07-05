<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function materi()
    {
        return $this->belongsTo(Materi::class);
    }
    
    public function matkul()
    {
        return $this->belongsTo(Materi::class);
    }
    
    public function dosen()
    {
        return $this->belongsTo(Dosen::class);
    }
    
    
}
