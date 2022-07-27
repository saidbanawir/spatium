<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Location;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardMyprofileController extends Controller
{
    public function edit()
    {
        return view('dashboard.myprofile.edit',[
            'locations'=>Location::orderBy('nama_kota','ASC')->get()
        ]);
    }

    public function update(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:255',
            'username' => 'required|min:5|max:30|unique:users,username,'.auth()->id(),
            'email' => 'required|email:dns',
            'kota' => 'required',
            'alamat' => 'required|max:255',
            'foto' => 'image|file|max:1024',
        ]);

        if ($request->file('foto')) {
            if($request->oldFoto){
                Storage::delete($request->oldFoto);
            }
            $validateData['foto'] = $request->file('foto')->store('user-image');
        }

        Perusahaan::where('id',auth()->user()->id)->first()->update($validateData);
        return back()->with('success','Your profile has been updated');
    }
}
