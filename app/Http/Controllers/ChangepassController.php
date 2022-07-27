<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ChangepassController extends Controller
{
    public function edit()
    {
        return view('changepass.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:5|confirmed'
        ]);

        if(Hash::check($request->current_password, auth()->user()->password)){
            // auth()->user()->update(['password'=>Hash::make($request->password)]);
            User::where('id',auth()->user()->id)->first()->update(['password'=>Hash::make($request->password)]);
            
            return back()->with('success','Your password has been updated');
        }
        throw ValidationException::withMessages([
            'current_password' => 'Your current password does not match with our record'
        ]);

    }
}
