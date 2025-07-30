<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JabatanSeeder extends Seeder
{
    public function run(): void
    {
        Jabatan::truncate();
        $jabatans = [
            ['nama_jabatan' => 'Apoteker Penanggung Jawab (APA)'],
            ['nama_jabatan' => 'Apoteker Pemilik Sarana Apotek (PSA)'],
            ['nama_jabatan' => 'Apoteker Pendamping'],
        ];
        foreach ($jabatans as $jabatan) {
            Jabatan::create($jabatan);
        }
    }
}
