<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    use HasFactory;

    protected $table = 'krs'; 
    protected $fillable = ['npm', 'kode_matakuliah'];

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'kode_matakuliah', 'kode_matakuliah');
    }
}