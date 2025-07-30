<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;
    protected $primaryKey = 'KdObat';

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'KdObat',
        'NmObat',
        'Jenis',
        'Satuan',
        'HargaBeli',
        'HargaJual',
        'Stok',
        'deskripsi',
        'KdSuplier',
    ];
}
