<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tagihan;
use App\Models\User;
use App\Models\Pembayaran;

class CetakController extends Controller
{
    
    public function cetak($id)
    {
        $data['pembayaran']= Pembayaran::with(['tagihan.siswa'])->where('id_tagihan', $id)->get();
        return view('admin.cetak' , $data);
    }
    public function detailPembayaran($id)
    {
        $data['pembayaran']= Pembayaran::with(['tagihan.siswa'])->where('id_tagihan', $id)->get();
        return view('admin.riwayatPembayaran' , $data);
    }
}
