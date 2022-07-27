<?php

namespace App\Http\Controllers;

use App\Models\Mycv;
use App\Models\User;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MyprofileController extends Controller
{
    public function edit()
    {
        return view('myprofile.edit',[
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

        $mycv['email'] = $validateData['email'];

        User::where('id',auth()->user()->id)->first()->update($validateData);
        Mycv::where('email', auth()->user()->email)->first()->update($mycv);

        return back()->with('success','Your profile has been updated');
    }
}
