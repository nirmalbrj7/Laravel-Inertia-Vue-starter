<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/admin', function (){
    return Inertia::render('Admin/Index');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $u = auth()->user()->first();
//    $u->assignRole('admin');
    //dd($u);
    return Inertia::render('Dashboard');
})->name('dashboard');
