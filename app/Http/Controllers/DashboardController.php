<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;
use App\Models\Pelamar;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $perusahaanCount = Perusahaan::count();
        $pelamarCount = Pelamar::count();
        $userChart = User::select(DB::raw('COUNT(*) as count'))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw('Month(created_at)'))
                    ->pluck('count');
        $months = User::select(DB::raw('Month(created_at) as month'))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw('Month(created_at)'))
                    ->pluck('month');
        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach($months as $index => $month)
        {
            $datas[$month] = $userChart[$index];
        }
        
        return view('dashboard.index', compact('userCount', 'perusahaanCount', 'pelamarCount','datas'));
    }
}
