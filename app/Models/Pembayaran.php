<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table='pembayarans';
    protected $fillable = [
        'id_petugas',
        'id_siswa',
        'id_tagihan',
        'tgl_bayar',
        'nominal',
    ];

    public function siswa()
    {
        return $this->hasOne(User::class, 'id', 'id_user');
    }
    public function petugas()
    {
        return $this->hasOne(User::class, 'id', 'id_petugas');
    }
    public function spp()
    {
        return $this->hasOne(Spp::class, 'id', 'id_spp');
    }
    public function tagihan()
    {
        return $this->hasOne(Tagihan::class, 'id', 'id_tagihan');
    }
    
}
