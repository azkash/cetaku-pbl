<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    // Jika nama tabel berbeda dengan nama model, tentukan nama tabel
    protected $table = 'penjualan';  // Ganti sesuai nama tabel Anda

    // Tentukan kolom yang boleh diisi (mass assignable)
    protected $fillable = ['total', 'created_at'];  // Tambahkan kolom sesuai kebutuhan
}
