<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function aslab()
    {
        return $this->belongsTo(Aslab::class);
    }
    
    public function matkul()
    {
        return $this->belongsTo(Matkul::class);
    }
}
