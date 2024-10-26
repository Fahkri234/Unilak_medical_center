<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'patients'; // Nama tabel
    protected $primaryKey = 'idpasien'; // Primary key yang sesuai

    protected $fillable = [
        'nik',
        'name',
        'birthdate',
        'address',
        'phone',
        'status',
    ];
}
