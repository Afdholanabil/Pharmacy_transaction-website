<?php

namespace Database\Seeders;

use App\Models\Obat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        // Kosongkan tabel obats sebelum diisi
        Obat::truncate();

        // Aktifkan kembali pengecekan foreign key
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $obats = [
            ['KdObat' => 'OB001', 'NmObat' => 'Paracetamol 500mg', 'Jenis' => 'Tablet', 'Satuan' => 'Strip', 'HargaBeli' => 5000, 'HargaJual' => 8000, 'Stok' => 100, 'deskripsi' => 'Digunakan untuk meredakan demam dan nyeri ringan hingga sedang, seperti sakit kepala, sakit gigi, dan nyeri otot.', 'KdSuplier' => 'SUP01'],
            ['KdObat' => 'OB002', 'NmObat' => 'Ibuprofen 400mg', 'Jenis' => 'Tablet', 'Satuan' => 'Strip', 'HargaBeli' => 7000, 'HargaJual' => 10000, 'Stok' => 80, 'deskripsi' => 'Obat anti-inflamasi nonsteroid (OAINS) untuk mengurangi peradangan dan nyeri.', 'KdSuplier' => 'SUP01'],
            ['KdObat' => 'OB003', 'NmObat' => 'Panadol Extra', 'Jenis' => 'Tablet', 'Satuan' => 'Strip', 'HargaBeli' => 9000, 'HargaJual' => 12000, 'Stok' => 75, 'deskripsi' => 'Mengandung Paracetamol dan Kafein untuk meredakan sakit kepala dan migrain dengan lebih cepat.', 'KdSuplier' => 'SUP02'],
            ['KdObat' => 'OB004', 'NmObat' => 'Amoxicillin 500mg', 'Jenis' => 'Kapsul', 'Satuan' => 'Strip', 'HargaBeli' => 12000, 'HargaJual' => 18000, 'Stok' => 50, 'deskripsi' => 'Antibiotik untuk mengobati berbagai jenis infeksi bakteri. Penggunaan harus dengan resep dokter.', 'KdSuplier' => 'SUP02'],
            ['KdObat' => 'OB005', 'NmObat' => 'Vitamin C IPI', 'Jenis' => 'Tablet', 'Satuan' => 'Botol', 'HargaBeli' => 6000, 'HargaJual' => 9000, 'Stok' => 120, 'deskripsi' => 'Suplemen untuk membantu memenuhi kebutuhan Vitamin C dan menjaga daya tahan tubuh.', 'KdSuplier' => 'SUP03'],
            ['KdObat' => 'OB006', 'NmObat' => 'Imboost Force', 'Jenis' => 'Kaplet', 'Satuan' => 'Strip', 'HargaBeli' => 35000, 'HargaJual' => 45000, 'Stok' => 60, 'deskripsi' => 'Suplemen peningkat daya tahan tubuh dengan Echinacea purpurea, Black Elderberry, dan Zinc Picolinate.', 'KdSuplier' => 'SUP03'],
            ['KdObat' => 'OB007', 'NmObat' => 'Blackmores Vitamin D3', 'Jenis' => 'Kapsul', 'Satuan' => 'Botol', 'HargaBeli' => 150000, 'HargaJual' => 180000, 'Stok' => 30, 'deskripsi' => 'Membantu memenuhi kebutuhan Vitamin D untuk kesehatan tulang, otot, dan sistem kekebalan tubuh.', 'KdSuplier' => 'SUP01'],
            ['KdObat' => 'OB008', 'NmObat' => 'OBH Combi Batuk Flu', 'Jenis' => 'Sirup', 'Satuan' => 'Botol', 'HargaBeli' => 15000, 'HargaJual' => 20000, 'Stok' => 90, 'deskripsi' => 'Meredakan batuk yang disertai gejala-gejala flu seperti demam, sakit kepala, hidung tersumbat, dan bersin-bersin.', 'KdSuplier' => 'SUP02'],
            ['KdObat' => 'OB009', 'NmObat' => 'Tolak Angin Cair', 'Jenis' => 'Cair', 'Satuan' => 'Box', 'HargaBeli' => 30000, 'HargaJual' => 38000, 'Stok' => 150, 'deskripsi' => 'Obat herbal terstandar untuk mengatasi masuk angin dengan gejala seperti mual, perut kembung, dan pusing.', 'KdSuplier' => 'SUP03'],
            ['KdObat' => 'OB010', 'NmObat' => 'Mylanta Cair', 'Jenis' => 'Sirup', 'Satuan' => 'Botol', 'HargaBeli' => 10000, 'HargaJual' => 14000, 'Stok' => 85, 'deskripsi' => 'Cepat meredakan gejala sakit maag yang disebabkan oleh kelebihan asam lambung, seperti perih dan mual.', 'KdSuplier' => 'SUP01'],
        ];
        foreach ($obats as $obat) {
            Obat::create($obat);
        }
    }
}
