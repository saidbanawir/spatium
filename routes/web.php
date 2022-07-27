<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisController;
use App\Http\Controllers\PelamarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MyprofileController;
use App\Http\Controllers\MycvController;
use App\Http\Controllers\ChangepassController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardPelamarController;
use App\Http\Controllers\DashboardMyprofileController;
use App\Http\Controllers\DashboardChangepassController;
use App\Http\Controllers\DashboardLoginController;
use App\Http\Controllers\DashboardPerusahaanController;
use App\Http\Controllers\HomeController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [HomeController::class, 'index']);

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::post('/posts', [PostController::class, 'store']);

Route::get('/regis', [RegisController::class, 'index'])->name('login')->middleware('guest');
Route::post('/regis', [RegisController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/dashboard/login', [DashboardLoginController::class, 'index'])->middleware('guest');
Route::post('/dashboard/login', [DashboardLoginController::class, 'authenticate']);
Route::post('/dashboard/logout', [DashboardLoginController::class, 'logout']);

Route::get('/changepass/edit', [ChangepassController::class,'edit'])->name('passwords.edit');
Route::put('/changepass/edit', [ChangepassController::class,'update']);

Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);

Route::group(['middleware'=>['auth:webperusahaan','checkrole:Admin,Perusahaan']], function(){
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('/dashboard/pelamar', DashboardPelamarController::class);
    Route::resource('/dashboard/posts', DashboardPostController::class);
    
    Route::get('/dashboard/myprofile/edit', [DashboardMyprofileController::class,'edit'])->name('myprofile.edit');
    Route::put('/dashboard/myprofile/update', [DashboardMyprofileController::class,'update'])->name('myprofile.update');
    
    Route::get('/dashboard/changepass/edit', [DashboardChangepassController::class,'edit'])->name('password.edit');
    Route::put('/dashboard/changepass/edit', [DashboardChangepassController::class,'update']);
    
});

Route::group(['middleware'=>['auth:webperusahaan','checkrole:Admin']], function(){
    Route::resource('/dashboard/users', DashboardUserController::class);
    Route::resource('/dashboard/perusahaans', DashboardPerusahaanController::class);
});

Route::group(['middleware'=>['auth','checkrole:Pelamar']], function(){
    Route::get('/history', [HistoryController::class, 'index']);
    Route::get('/mycv', [MycvController::class, 'index'])->name('mycv.index');
    Route::post('/mycv', [MycvController::class, 'store'])->name('mycv.store');
    Route::get('/mycv/edit', [MycvController::class, 'edit'])->name('mycv.edit');
    Route::put('/mycv/update', [MycvController::class, 'update'])->name('mycv.update');
    // Route::get('/history/{pelamar:slug}', [HistoryController::class, 'show']);
    Route::get('/myprofile/edit', [MyprofileController::class,'edit'])->name('myprofiles.edit');
    Route::put('/myprofile/update', [MyprofileController::class,'update'])->name('myprofiles.update');
});