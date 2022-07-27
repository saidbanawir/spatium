<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Location;
use App\Models\Mycv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function Ramsey\Uuid\v1;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $data['q']=$request->q;
        $data['rows']=User::where('nama','like','%'.$request->q.'%')->orderBy('created_at', 'DESC')->paginate(10); 
        return view('dashboard.users.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create', [
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

        $validateData['role'] = value('Pelamar');
        $validateData['password'] = bcrypt($validateData['password']);

        User::create($validateData);

        return redirect('/dashboard/users')->with('success', 'New user has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('dashboard.users.show', [
            'user' => $user
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
        return view('dashboard.users.edit', [
            'user' => $user,
            'locations'=>Location::orderBy('nama_kota','ASC')->get()
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

        User::where('id',$user->id)->update($validateData);

        return redirect('/dashboard/users')->with('success', 'User has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->foto){
            Storage::delete($user->foto);
        }
        User::destroy($user->id);
        return redirect('/dashboard/users')->with('delete', 'User has been deleted');
    }
}
