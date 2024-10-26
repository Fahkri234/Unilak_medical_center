<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $table = 'consultations'; // Nama tabel

    protected $fillable = [
        'idpasien', // Pastikan nama ini sesuai dengan kolom di tabel consultations
        'tanggal',
        'nik',
        'name',
        'no_hp',
        'status_keterangan',
        'hasil_analisa',
        'resep_obat',
    ];

    // Definisikan relasi dengan Patient
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'idpasien', 'idpasien');
    }
}
