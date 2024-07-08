<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    //untuk menambah data yg diisi apa aja(manual) step 1
    protected $fillable = [
        'name',
        'nim',
        'universitas',
        'keterangan',
    ];
}
