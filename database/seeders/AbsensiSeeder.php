<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Absensi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AbsensiSeeder extends Seeder
{
    public function run(): void {
        $apotekers = User::where('role', 'apoteker')->get();
        foreach ($apotekers as $key => $apoteker) {
            Absensi::create([
                'user_id' => $apoteker->id,
                'tanggal' => Carbon::today(),
                'status' => $key % 2 == 0 ? 'hadir' : 'belum_hadir',
            ]);
        }
    }
}
