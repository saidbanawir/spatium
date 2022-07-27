<?php

namespace App\Http\Controllers;
use App\Models\Mycv;
use App\Models\User;
use Illuminate\Http\Request;

class MycvController extends Controller
{
       
    public function edit()
    {
        // if(Mycv::where('user_id', auth()->user()->id)->first()){

        //     return view('mycv.edit',[
        //         'mycv' => Mycv::where('email', auth()->user()->email)->first()
        //     ]);
        // }else{
        //     return back()->with('warning','Access denied, please upload your cv first !!!');;
        // }

        return view('mycv.edit', [
            'mycv' => Mycv::where('email', auth()->user()->email)->first()
        ]);
    }

    public function update(Request $request)
    {
        $validateData = $request->validate([
            'foto' => 'image|file|max:5120',
        ]);

        if ($request->file('foto')) {
            $validateData['foto'] = $request->file('foto')->store('cv-image');
        }

        $validateData['user_id'] = auth()->user()->id;
        
        Mycv::where('email',auth()->user()->email)->first()->update($validateData);
        return back()->with('success','Your CV has been uploaded');
    }
}
