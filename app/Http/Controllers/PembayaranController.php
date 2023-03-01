<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// tambahkan
use App\Models\User;
use App\Models\Kelas;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Hash;
use DataTables;
use App\Http\Controllers\Controller; 
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PembayaranController extends Controller
{
    public function viewPembayaran()
    {
        $data['siswa']= User::where('level', 'siswa')->get();
        $data['kelas']=Kelas::all();
        return view('admin.viewPembayaran', $data);
    }
    public function viewDetailPembayaran($id)
    {
        $data['pembayaran']= Pembayaran::with(['tagihan.siswa'])->where('id_tagihan', $id)->get();
        return view('admin.viewDetailPembayaran' , $data);

        // $data['siswa']= User::where('level', 'siswa')->get();
        // $data['kelas']=Kelas::all();
        // return view('admin.viewDetailPembayaran', $data);
    }
    public function viewLaporan()
    {
        $data['pembayaran']=Pembayaran::all();
        return view('admin.viewLaporan', $data);
    }

    public function cetakLaporan()
    {
        $data['pembayaran']=Pembayaran::all();
        return view('admin.cetakLaporan', $data);
    }
}