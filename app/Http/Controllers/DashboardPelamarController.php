<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pelamar;
use App\Models\Mycv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardPelamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cvpelamar = DB::table('pelamars')
                    ->where('pelamars.id_perusahaan', auth()->user()->id)
                    ->join('mycvs','pelamars.email_pelamar',"=",'mycvs.email')
                    ->orderBy('pelamars.created_at', 'DESC')->paginate(10);

        return view('dashboard.pelamar.index'
        // , [
        //     'pelamars' => Pelamar::where('id_perusahaan', auth()->user()->id)->orderBy('created_at','DESC')->paginate(10)
        // ]
        ,compact('cvpelamar'));
    }

    public function edit(Pelamar $pelamar)
    {
        if($pelamar['status'] != 'Pending'){
            return redirect('/dashboard/pelamar');
        }else{
            return view('dashboard.pelamar.edit',[
                'pelamar' => $pelamar
            ]);
        }
    }
    
    public function update(Request $request, Pelamar $pelamar)
    {
        $validateData = $request->validate([
            'status' => 'required'
        ]);
        
        Pelamar::where('id', $pelamar->id )->update($validateData);

        return redirect('/dashboard/pelamar')->with('success', 'Pelamar has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelamar  $pelamar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelamar $pelamar)
    {
        //
    }
}
