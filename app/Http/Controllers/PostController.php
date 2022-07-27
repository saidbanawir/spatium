<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\User;
use App\Models\Pelamar;
use App\Models\Perusahaan;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {   
        return view('posts', [
            'posts' =>Post::latest()->filter(request(['search']))->paginate(5)->withQueryString(),
            'users' =>User::all(),
            'perusahaans' => Perusahaan::all(),
        ]);
    }
    
    public function show(Post $post)
    {
        return view('post',[
            "post" => $post
        ]);
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id_perusahaan' => 'required',
            'post_id' => 'required',
            'judul_post' => 'required',
            'slug' => 'required',
        ]);
            
        $validateData['status'] = value('Pending');
        $validateData['user_id'] = auth()->user()->id;
        $validateData['nama_pelamar'] = auth()->user()->nama;
        $validateData['email_pelamar'] = auth()->user()->email;
        Pelamar::create($validateData);
        return redirect('/posts')->with('success', 'Successfully applied, please wait.');
    }

}
