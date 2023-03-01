<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// tambahkan
use App\Models\Kelas;
use Illuminate\Support\Facades\Hash;
use DataTables;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class KelasController extends Controller
{
    protected $kelas = null;

    public function __construct()
    {   
        $this->middleware('auth');
    }
    public function viewKelas()
    {
        $data['kelas'] = Kelas::all();
        return view('admin.viewKelas', $data);
    }
    public function tambahKelas(Request $request)
    {
        $request->validate([
            'kelas'=>'required',
            'jurusan'=>'required',
        ]);

        $data = [
            'nama_kelas'=>request()->kelas,
            'jurusan'=>request()->jurusan,
        ];
        Kelas::create($data);
        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }
    public function ubahKelas(Request $request, $id)
    {
        $request->validate([
            'kelas'=>'required',
            'jurusan'=>'required',
        ]);
        Kelas::where('id', $id)->update([
            'nama_kelas'=>request()->kelas,
            'jurusan'=>request()->jurusan,
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }
    public function hapusKelas($id)
    {
        Kelas::where('id', $id)->delete(); 
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
