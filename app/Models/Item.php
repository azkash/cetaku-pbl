<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_item',
        'deskripsi',
        'foto',
    ];

    public function ukuran()
    {
        return $this->belongsToMany(\App\Models\Ukuran::class, 'item_ukuran', 'item_id', 'ukuran_id');
    }

    public function bahan()
    {
        return $this->belongsToMany(\App\Models\Bahan::class, 'item_bahan', 'item_id', 'bahan_id');
    }

    public function jenis()
    {
        return $this->belongsToMany(\App\Models\Jenis::class, 'item_jenis', 'item_id', 'jenis_id');
    }

}
