<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $users=Perusahaan::where('role','Perusahaan')->orderBy('created_at', 'DESC')->paginate(9);
        return view('home', compact('users'));
    }
}
