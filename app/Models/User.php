<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'foto_profil',
        'alamat',
        'jabatan',
        'tanggal_mulai_tugas',
        'status_aktif',
        'tentang',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function jabatan() {
        return $this->belongsTo(Jabatan::class);
    }
    public function absensiHariIni() {
        return $this->hasOne(Absensi::class)->whereDate('tanggal', today());
    }
}
