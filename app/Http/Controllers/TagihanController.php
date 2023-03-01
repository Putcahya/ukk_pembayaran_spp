<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// tambahkan
use App\Models\User;
use App\Models\Kelas;
use App\Models\Tagihan;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Hash;
use DataTables;
use App\Http\Controllers\Controller;
use App\Models\Spp;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class TagihanController extends Controller
{
    public function viewTagihan($id)
    {
        $data['tagihan']= Tagihan::with(['siswa.spp'])->where('id_siswa', $id)->get();
        $data['siswa']= User::where('id', $id)->get();
        // $data['spps']= Spp::all();
        return view('admin.viewTagihan', $data);
    }
    public function bayar(Request $request)
    {
        // dd($request);
        $request->validate([
            'id_tagihan'=>'required',
            'id_siswa'=>'required',
            'id_petugas'=>'required',
            'tgl_bayar'=>'required',
            'nominal'=>'required',
        ]);

        $data = [
            'id_petugas'=>request()->id_petugas,
            'id_siswa'=>request()->id_siswa,
            'id_tagihan'=>request()->id_tagihan,
            'tgl_bayar'=>request()->tgl_bayar,
            'nominal'=>request()->nominal,
        ];
        $spp_id = Pembayaran::create($data)->id_tagihan;

        Tagihan::where('id', $spp_id)->update([
            'status'=>'Dibayar',
        ]);

        return redirect()->back()->with('success', 'Pembayaran SPP Berhasil');
    }
}
