<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// tambahkan
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DataTables;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class PetugasController extends Controller
{
    protected $user = null;

    public function __construct()
    {   
        $this->middleware('auth');
    }
    public function viewPetugas()
    {
        $data['petugas']= User::where('level', 'petugas')->get();
        return view('admin.viewPetugas', $data);
    }
    public function tambahPetugas(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'alamat'=>'required',
            'telepon'=>'required',
            'password'=>'required',
        ]);

        $data = [
            'name'=>request()->name,
            'email'=>request()->email,
            'alamat'=>request()->alamat,
            'telepon'=>request()->telepon,
            'password'=>Hash::make(request()->password),
            'level'=>'petugas',
        ];
        user::create($data);
        // user::create($request->except(['_token']));
        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }
    public function ubahPetugas(Request $request, $id)
    {
        if (request()->new_password) {
            $password= Hash::make(request()->new_password);
        } else {
            $password = request()->password;
        }
        

        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'alamat'=>'required',
            'telepon'=>'required',
            'password'=>'required',
        ]);
        User::where('id', $id)->update([
            'name'=>request()->name,
            'email'=>request()->email,
            'alamat'=>request()->alamat,
            'telepon'=>request()->telepon,
            'password'=>$password,
            'level'=>'petugas',
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }
    public function hapusPetugas($id)
    {
        User::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
