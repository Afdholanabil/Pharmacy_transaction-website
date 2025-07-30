<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        User::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $users = [
            // ADMIN
            [
                'name' => 'Admin Apotek',
                'email' => 'admin@apoteksehat.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ],
            // APOTEKER
            [
                'name' => 'Dr. Anisa Putri, S.Farm., Apt.',
                'email' => 'anisa.apoteker@apoteksehat.com',
                'password' => Hash::make('password'),
                'foto_profil' => 'avatars/apoteker1.png',
                'role' => 'apoteker',
                'jabatan' => 'Apoteker Penanggung Jawab',
                'tanggal_mulai_tugas' => '2022-01-15',
                'status_aktif' => true,
                'tentang' => 'Berpengalaman lebih dari 5 tahun dalam manajemen apotek dan pelayanan farmasi klinis.',
            ],
            [
                'name' => 'Rahmat Hidayat, S.Farm',
                'email' => 'rahmat.apoteker@apoteksehat.com',
                'password' => Hash::make('password'),
                'foto_profil' => 'avatars/apoteker1.png',
                'role' => 'apoteker',
                'jabatan' => 'Apoteker Pendamping',
                'tanggal_mulai_tugas' => '2023-03-20',
                'status_aktif' => true,
                'tentang' => 'Memiliki keahlian dalam konseling obat dan manajemen sediaan farmasi.',
            ],
            [
                'name' => 'Siti Nurhaliza, S.Farm',
                'email' => 'siti.apoteker@apoteksehat.com',
                'password' => Hash::make('password'),
                'foto_profil' => 'avatars/apoteker1.png',
                'role' => 'apoteker',
                'jabatan' => 'Apoteker Pendamping',
                'tanggal_mulai_tugas' => '2023-08-01',
                'status_aktif' => true,
                'tentang' => 'Fokus pada pelayanan resep dan edukasi pasien mengenai penggunaan obat yang tepat.',
            ],
            [
                'name' => 'Eko Prasetyo, S.Farm',
                'email' => 'eko.apoteker@apoteksehat.com',
                'password' => Hash::make('password'),
                'foto_profil' => 'avatars/apoteker1.png',
                'role' => 'apoteker',
                'jabatan' => 'Apoteker Pendamping',
                'tanggal_mulai_tugas' => '2024-02-10',
                'status_aktif' => false,
                'tentang' => 'Apoteker yang sedang dalam masa cuti, memiliki spesialisasi di bidang farmakologi.',
            ],
            [
                'name' => 'Eko Prasetyo, S.Farm',
                'email' => 'eko2.apoteker@apoteksehat.com',
                'password' => Hash::make('password'),
                'foto_profil' => 'avatars/apoteker1.png',
                'role' => 'apoteker',
                'jabatan' => 'Apoteker Pendamping',
                'tanggal_mulai_tugas' => '2024-02-10',
                'status_aktif' => false,
                'tentang' => 'Apoteker yang sedang dalam masa cuti, memiliki spesialisasi di bidang farmakologi.',
            ],
            // PELANGGAN
            [
                'name' => 'Budi Santoso',
                'email' => 'budi@example.com',
                'password' => Hash::make('password'),
                'role' => 'pelanggan',
            ],
            [
                'name' => 'Citra Lestari',
                'email' => 'citra@example.com',
                'password' => Hash::make('password'),
                'role' => 'pelanggan',
            ],
        ];

        // Masukkan data ke dalam database
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
