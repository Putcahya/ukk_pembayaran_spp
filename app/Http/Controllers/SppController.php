<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// tambahkan
use App\Models\Spp;
use Illuminate\Support\Facades\Hash;
use DataTables;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SppController extends Controller
{
    public function viewSpp()
    {
        $data['spp'] = Spp::all();
        return view('admin.viewSpp', $data);
    }
    public function tambahSpp(Request $request)
    {
        $request->validate([
            'tahun'=>'required',
            'nominal'=>'required',
        ]);

        $data = [
            'tahun'=>request()->tahun,
            'nominal'=>request()->nominal,
        ];
        Spp::create($data);
        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }
    public function ubahSpp(Request $request, $id)
    {
        $request->validate([
            'tahun'=>'required',
            'nominal'=>'required',
        ]);
        Spp::where('id', $id)->update([
            'tahun'=>request()->tahun,
            'nominal'=>request()->nominal,
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }
    public function hapusSpp($id)
    {
        spp::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
