<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $primaryKey = 'Nota';
    public $incrementing = false;
    protected $keyType = 'string';

    public function pelanggan() {
        return $this->belongsTo(Pelanggan::class, 'KdPelanggan', 'KdPelanggan');
    }
    public function detail_transaksis() {
        return $this->hasMany(PenjualanDetail::class, 'Nota', 'Nota');
    }
}
