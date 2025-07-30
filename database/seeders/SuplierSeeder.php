<?php

namespace Database\Seeders;

use App\Models\Suplier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SuplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // PERBAIKAN: Nonaktifkan pengecekan foreign key sebelum truncate
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Kosongkan tabel supliers terlebih dahulu
        Suplier::truncate();

        // Aktifkan kembali pengecekan foreign key
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $suplier = [
            [
                'KdSuplier' => 'SUP01',
                'NmSuplier' => 'Kimia Farma',
                'Alamat' => 'Jalan Suplier 1',   
                'Kota' => 'Surabaya',
                'Telpon' => '08123456789',
            ],
            [
                'KdSuplier' => 'SUP02',
                'NmSuplier' => 'Suplier 2',
                'Alamat' => 'Jalan Suplier 2',   
                'Kota' => 'Surabaya',
                'Telpon' => '0987654321',
            ],
            [
                'KdSuplier' => 'SUP03',
                'NmSuplier' => 'Suplier 3',
                'Alamat' => 'Jalan Suplier 3',   
                'Kota' => 'Surabaya',
                'Telpon' => '0876543210',
            ],
            [
                'KdSuplier' => 'SUP04',
                'NmSuplier' => 'Suplier 4',
                'Alamat' => 'Jalan Suplier 4',   
                'Kota' => 'Surabaya',
                'Telpon' => '0876543210',
            ],
        ];

        foreach ($suplier as $suplier) {
            Suplier::create($suplier);
        }
    }
}
