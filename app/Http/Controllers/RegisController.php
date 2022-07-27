<?php

namespace App\Http\Controllers;

use App\Models\Mycv;
use App\Models\User;
use App\Models\Location;
use Illuminate\Http\Request;

class RegisController extends Controller
{
    public function index()
    {
        return view('regis.index', [
            'locations'=>Location::orderBy('nama_kota','ASC')->get()
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:255',
            'username' => 'required|min:5|max:30|unique:users',
            'password' => 'required|min:5',
            'email' => 'required|unique:users',
            'kota'=>'required',
            'alamat' => 'required|max:255',
        ]);

        $validateData['role'] = value('Pelamar');
        $validateData['password'] = bcrypt($validateData['password']);

        User::create($validateData);

        $mycv['email'] = $validateData['email'];

        Mycv::create($mycv);

        //$request->session()->flash('regis_sukses', 'Registrasi berhasil silahkan login');

        return redirect('/login')->with('regis_sukses', 'Registration successfully, please login');
    }
}
