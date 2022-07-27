<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Faker\Provider\ar_EG\Person;
use Illuminate\Support\Facades\Storage;

class DashboardPerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['q']=$request->q;
        $data['rows']=Perusahaan::where('nama','like','%'.$request->q.'%')->orderBy('created_at', 'DESC')->paginate(10); 
        return view('dashboard.perusahaans.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.perusahaans.create', [
            'locations'=>Location::orderBy('nama_kota','ASC')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:255',
            'username' => 'required|min:5|max:30|unique:users',
            'password' => 'required|min:5',
            'email' => 'required|unique:users',
            'kota' => 'required',
            'alamat' => 'required|max:255',
            'foto' => 'image|file|max:1024',
            
        ]);

        if ($request->file('foto')) {
            $validateData['foto'] = $request->file('foto')->store('user-image');
        }

        $validateData['role'] = value('Perusahaan');
        $validateData['password'] = bcrypt($validateData['password']);

        Perusahaan::create($validateData);

        return redirect('/dashboard/perusahaans')->with('success', 'New company has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Perusahaan $perusahaan)
    {
        return view('dashboard.perusahaans.show', [
            'perusahaan' => $perusahaan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Perusahaan $perusahaan)
    {
        return view('dashboard.perusahaans.edit', [
            'perusahaan' => $perusahaan,
            'locations'=>Location::orderBy('nama_kota','ASC')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Perusahaan $perusahaan)
    {
        $validateData = $request->validate([
            'nama' => 'required|max:255',
            'username' => 'required|min:5|max:30',
            'email' => 'required|email:dns',
            'kota' => 'required',
            'alamat' => 'required|max:255',
            'foto' => 'image|file|max:1024',
            'role' => 'required|max:10',
        ]);


        if ($request->file('foto')) {
            // if($request->oldFoto){
            //     Storage::delete($request->oldFoto);
            // }
            $validateData['foto'] = $request->file('foto')->store('user-image');
        }

        Perusahaan::where('id',$perusahaan->id)->update($validateData);

        return redirect('/dashboard/perusahaans')->with('success', 'Company has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perusahaan $perusahaan)
    {
        if($perusahaan->foto){
            Storage::delete($perusahaan->foto);
        }
        Perusahaan::destroy($perusahaan->id);
        return redirect('/dashboard/perusahaans')->with('delete', 'Company has been deleted');
    }
}
