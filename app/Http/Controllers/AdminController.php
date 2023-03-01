<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// tambahkan
use App\Models\User;
use App\Models\Log;
use App\Models\Pembayaran;
use DataTables;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    protected $user = null;
    public function __construct() {
        $this->middleware('auth');
    }
    public function viewAdmin()
    {
        $data['petugas']= User::where('level', 'Petugas')->count();
        $data['siswa']= User::where('level', 'Siswa')->count();
        $data['pembayaran']= Pembayaran::all()->count();
        // $data['log'] = Log::all()->sortByDesc('created_at');
        return view('admin.viewDashboard', $data);
    }
    public function viewProfile($id)
    {
        $data['profile'] = User::where('id', $id)->get();
        return view('admin.viewProfile', $data);
    }
    public function ubahProfile(Request $request, $id)
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
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }
}
