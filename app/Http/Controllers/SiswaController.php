<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// tambahkan
use App\Models\User;
use App\Models\Kelas;
use App\Models\Tagihan;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use DataTables;
use App\Http\Controllers\Controller;
use App\Models\Spp;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SiswaController extends Controller
{
    // frontpage start
    public function viewDetail($id)
    {
        $data['pembayaran']= Pembayaran::with(['tagihan.siswa'])->where('id_tagihan', $id)->get();
        return view('siswa.viewDetail' , $data);
    }
    public function tampilanSiswa()
    {
        // $data['siswa'] = Pembayaran::with(['siswa.kelas', 'siswa.spp', 'pembayaran'])->where('id_siswa', Auth::user()->id)->get();
        //  return view('siswa.viewSiswa', $data);

        // $data['tagihan']= Tagihan::with(['siswa.spp'])->where('id_siswa', $id)->get();
        // $data['siswa']= User::where('id', $id)->get();
        // $data['spps']= Spp::all();
        // return view('admin.viewTagihan', $data);
        
        // $data['pembayaran']= Pembayaran::with(['tagihan.siswa'])->where('id_tagihan', $id)->get();
        // return view('admin.viewDetailPembayaran' , $data);
        
        $data['pembayaran']= Pembayaran::with(['tagihan.siswa'])->where('id_tagihan', )->get();
        $data['tagihan']= Tagihan::with(['siswa.spp'])->where('id_siswa', Auth::user()->id)->get();
        return view('siswa.viewSiswa',$data );
    }
    public function viewProfile($id)
    {
        $data['siswa'] = User::where('id', $id)->get();
        return view('siswa.viewProfile', $data);
    }
    // frontpage end

    // admin start
    public function viewSiswa()
    {
        $data['siswa']= User::where('level', 'siswa')->get();
        $data['kelas']=Kelas::all(); 
        $data['spp']=Spp::all();
        return view('admin.viewSiswa', $data);
    }
    public function tambahSiswa(Request $request)
    {
        $request->validate([
            'nisn'=>'required',
            'nis'=>'required',
            'id_kelas'=>'required',
            'id_spp'=>'required',
            'name'=>'required',
            'email'=>'required',
            'alamat'=>'required',
            'telepon'=>'required',
        ]);
        $siswa = [
            'nisn'=>request()->nisn,
            'nis'=>request()->nis,
            'id_kelas'=>request()->id_kelas,
            'id_spp'=>request()->id_spp,
            'name'=>request()->name,
            'email'=>request()->email,
            'alamat'=>request()->alamat,
            'telepon'=>request()->telepon,
            'password'=>Hash::make(request()->nis),
            'level'=>'siswa',
        ];
        
        $siswa_id= User::create($siswa)->id;

        Tagihan::create([
            'id_siswa'=>$siswa_id,
            'bulan'=>'Januari',
            'status'=>'Belum Dibayar',
        ]);
        Tagihan::create([
            'id_siswa'=>$siswa_id,
            'bulan'=>'Februari',
            'status'=>'Belum Dibayar',
        ]);
        Tagihan::create([
            'id_siswa'=>$siswa_id,
            'bulan'=>'Maret',
            'status'=>'Belum Dibayar',
        ]);
        Tagihan::create([
            'id_siswa'=>$siswa_id,
            'bulan'=>'April',
            'status'=>'Belum Dibayar',
        ]);
        Tagihan::create([
            'id_siswa'=>$siswa_id,
            'bulan'=>'Mei',
            'status'=>'Belum Dibayar',
        ]);
        Tagihan::create([
            'id_siswa'=>$siswa_id,
            'bulan'=>'Juni',
            'status'=>'Belum Dibayar',
        ]);
        Tagihan::create([
            'id_siswa'=>$siswa_id,
            'bulan'=>'Juli',
            'status'=>'Belum Dibayar',
        ]);
        Tagihan::create([
            'id_siswa'=>$siswa_id,
            'bulan'=>'Agustus',
            'status'=>'Belum Dibayar',
        ]);
        Tagihan::create([
            'id_siswa'=>$siswa_id,
            'bulan'=>'September',
            'status'=>'Belum Dibayar',
        ]);
        Tagihan::create([
            'id_siswa'=>$siswa_id,
            'bulan'=>'Oktober',
            'status'=>'Belum Dibayar',
        ]);
        Tagihan::create([
            'id_siswa'=>$siswa_id,
            'bulan'=>'November',
            'status'=>'Belum Dibayar',
        ]);
        Tagihan::create([
            'id_siswa'=>$siswa_id,
            'bulan'=>'Desember',
            'status'=>'Belum Dibayar',
        ]);
        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }
    public function ubahSiswa(Request $request, $id)
    {
        $request->validate([
            'nisn'=>'required',
            'nis'=>'required',
            'id_kelas'=>'required',
            'id_spp'=>'required',
            'name'=>'required',
            'email'=>'required',
            'alamat'=>'required',
            'telepon'=>'required',
        ]);
        User::where('id', $id)->first()->update([
            'nisn'=>request()->nisn,
            'nis'=>request()->nis,
            'id_kelas'=>request()->id_kelas,
            'id_spp'=>request()->id_spp,
            'name'=>request()->name,
            'email'=>request()->email,
            'alamat'=>request()->alamat,
            'telepon'=>request()->telepon,
            // 'password'=>request()->password,
            'level'=>'siswa',
        ]);
        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }
    public function hapusSiswa($id)
    {
        User::where('id', $id)->first()->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
