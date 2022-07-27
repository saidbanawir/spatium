<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role == 'Admin') {
            return view('dashboard.posts.index', [
                'posts' => Post::paginate(10)
            ]);
        } else {
            return view('dashboard.posts.index', [
                'posts' => Post::where('user_id', auth()->user()->id)->orderBy('created_at','DESC')->paginate(10)
            ]);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('dashboard.posts.create');
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
            'judul_post' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'deskripsi' => 'required',
            'persyaratan' => 'required',
        ]);

        $validateData['user_id'] = auth()->user()->id;
        $validateData['nama_perusahaan'] = auth()->user()->nama;
        $validateData['kota_perusahaan'] = auth()->user()->kota;
        $validateData['alamat_perusahaan'] = auth()->user()->alamat;
        $validateData['foto_perusahaan'] = auth()->user()->foto;
        $validateData['exerpt'] = Str::limit(strip_tags($request->deskripsi), 200);
        $validateData['expired_at'] = Carbon::now()->addDay(30)->endOfDay();

        Post::create($validateData);
        return redirect('/dashboard/posts')->with('success', 'New post has been added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view ('dashboard.posts.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validateData = [
            'judul_post' => 'required|max:255',
            'deskripsi' => 'required',
            'persyaratan' => 'required'
        ];

        if($request->slug != $post->slug)
        {
            $validateData['slug'] = 'required|unique:posts';
        }

        $validateData2['user_id'] = auth()->user()->id;
        $validateData2['nama_perusahaan'] = auth()->user()->nama;
        $validateData2['kota_perusahaan'] = auth()->user()->kota;
        $validateData2['alamat_perusahaan'] = auth()->user()->alamat;
        $validateData2['exerpt'] = Str::limit(strip_tags($request->deskripsi), 200);

        $validateData2 = $request->validate($validateData);

        Post::where('id', $post->id)->update($validateData2);
        return redirect('/dashboard/posts')->with('success', 'Post has been edited');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('delete', 'Post has been deleted');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug'=>$slug]);
    }
}
