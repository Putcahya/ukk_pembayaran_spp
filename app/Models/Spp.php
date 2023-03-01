<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spp extends Model
{
    use HasFactory;
    protected $table='spps';

    protected $fillable = [
        'tahun',
        'nominal',
        
    ];
    // public function kelas()
    // {
    //     return $this->hasOne(Kelas::class, 'id', 'id_kelas');
    // }
    public function spp()
    {
        return $this->hasOne(Spp::class, 'id', 'id_spp');
    }
    public function siswa()
    {
        return $this->hasOne(User::class, 'id', 'id_siswa');
    }
    
}
