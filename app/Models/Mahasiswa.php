<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by',
        'nim',
        'nama',
        'tanggal_lahir',
        'alamat',
    ];
}
