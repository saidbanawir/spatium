<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('profile.index',[
            'user' => User::where('id', auth()->user()->id)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('profile.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:255',
            'username' => 'required|min:5|max:30',
            'email' => 'required|email:dns',
            'alamat' => 'required|max:255',
            'foto' => 'image|file|max:1024',
        ]);


        if ($request->file('foto')) {
            if($request->oldFoto){
                Storage::delete($request->oldFoto);
            }
            $validateData['foto'] = $request->file('foto')->store('user-image');
        }

        User::where('id',$user->id)->update($validateData);

        return redirect('/profile');
    }
}
