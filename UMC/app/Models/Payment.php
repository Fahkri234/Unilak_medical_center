<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'idpasien',
        'jumlah',
        'tanggal',
    ];

    protected $casts = [
        'tanggal' => 'datetime', // Cast 'tanggal' to a Carbon instance
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'idpasien', 'idpasien');
    }
}

