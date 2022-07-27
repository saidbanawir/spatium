<?php

namespace App\Http\Controllers;

use App\Models\Pelamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function index()
    {
        $pelamars = DB::table('pelamars')
                    ->where('pelamars.user_id', auth()->user()->id)
                    ->join('posts','pelamars.post_id', "=", 'posts.id')
                    ->orderBy('pelamars.created_at' , 'DESC')->get();
        // dd($pelamars);
        return view('history.index', compact('pelamars'));
    }
    // public function show()
    // {
    //     $pelamars = DB::table('pelamars')
    //     ->where('pelamars.user_id', auth()->user()->id)
    //     ->join('posts','pelamars.post_id', "=", 'posts.id')->get()->find();
    //     // dd($pelamars);
        
    //     return view('history.show', compact('pelamars'));
    // }
}
