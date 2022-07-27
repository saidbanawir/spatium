<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Perusahaan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class DashboardChangepassController extends Controller
{
    public function edit()
    {
        return view('dashboard.changepass.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:5|confirmed'
        ]);

        if(Hash::check($request->current_password, auth()->user()->password)){
            // auth()->user()->update(['password'=>Hash::make($request->password)]);
            Perusahaan::where('id',auth()->user()->id)->first()->update(['password'=>Hash::make($request->password)]);
            
            return back()->with('success','Your password has been updated');
        }
        throw ValidationException::withMessages([
            'current_password' => 'Your current password does not match with our record'
        ]);

    }
}
