<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;
    protected $table='tagihans';

    protected $fillable = [
        'id_siswa',
        'bulan',
        'status',
        
    ];
    public function siswa()
    {
        return $this->hasOne(User::class, 'id', 'id_siswa');
    }
    public function spp()
    {
        return $this->hasOne(Spp::class, 'id', 'id_spp');
    }
    public function petugas()
    {
        return $this->hasOne(User::class, 'id', 'id_petugas');
    }
    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id', 'id_tagihan');
    }
}
