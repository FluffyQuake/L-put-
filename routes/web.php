<?php

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\LaduController;
use App\Http\Controllers\MudelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SisestamineController;
use App\Models\Ladu;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
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

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('ladu', LaduController::class)->withTrashed()->except('update');
    // Route::post('ladu/update/{ladu}', [LaduController::class, 'update'])->name('ladu.update');
    
    Route::post('/device', [DeviceController::class, 'store'])->name('device');
    Route::get('/device', [DeviceController::class, 'index'])->name('device');
    // Route::resource('device', DeviceController::class);
    // Route::get('/device/create', [DeviceController::class, 'create'])->name('device.create');
    
    Route::post('sisestamine', [SisestamineController::class, 'store'])->name('sisestamine.store');
    Route::resource('sisestamine', SisestamineController::class);
    // $sisestamine = DB::table('mudel')->get()->dd();
    
    Route::post('/mudel', [MudelController::class, 'store'])->name('mudel');
    Route::get('/mudel', [MudelController::class, 'index'])->name('mudel');
    // Route::resource('mudel', MudelController::class);

});


require __DIR__.'/auth.php';
