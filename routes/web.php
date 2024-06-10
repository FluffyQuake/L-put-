<?php

use App\Http\Controllers\DeviceController;
use App\Http\Controllers\LaduController;
use App\Http\Controllers\MudelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SisestamineController;
use App\Models\Sisestamine;
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

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('ladu', LaduController::class);
    Route::get('/ladu', [LaduController::class, 'index'])->name('ladu');
    Route::get('/ladu/edit', [LaduController::class, 'edit'])->name('ladu.edit');

    // Route::post('ladu/update/{ladu}', [LaduController::class, 'update'])->name('ladu.update');
    
    Route::post('/device', [DeviceController::class, 'store'])->name('device');
    Route::get('/device', [DeviceController::class, 'index'])->name('device');
    // Route::resource('device', DeviceController::class);
    // Route::get('/device/create', [DeviceController::class, 'create'])->name('device.create');
    
    Route::post('/sisestamine', [SisestamineController::class, 'store'])->name('sisestamine');
    Route::get('/sisestamine', [SisestamineController::class, 'index'])->name('sisestamine');
    Route::delete('/sisestamine', [SisestamineController::class, 'destroy'])->name('sisestamine.destroy');
    Route::put('/sisestamine', [SisestamineController::class, 'update'])->name('sisestamine.update');

    // Route::resource('sisestamine', SisestamineController::class);
    // $sisestamine = DB::table('sisestamine')->get()->dd();
    
    Route::post('/mudel', [MudelController::class, 'store'])->name('mudel');
    Route::get('/mudel', [MudelController::class, 'index'])->name('mudel');
    // Route::resource('mudel', MudelController::class);

    Route::get('/ladu', [LaduController::class, 'index'])->name('ladu.index');

    // Route for displaying edit form
    Route::get('/ladu/{id}/edit', [LaduController::class, 'edit'])->name('ladu.edit');

    // Route for updating item
    Route::put('/ladu/{id}', [LaduController::class, 'update'])->name('ladu.update');

    // Route for deleting item
    Route::delete('/ladu/{id}', [LaduController::class, 'destroy'])->name('ladu.destroy');
    Route::get('/ladu/{sisestamine}/edit', [LaduController::class, 'edit'])->name('ladu.edit');
    Route::get('/ladu', [LaduController::class, 'index'])->name('ladu');

});


// Route::post('/sisestamine/create', [SisestamineController::class, 'store']);

require __DIR__.'/auth.php';

