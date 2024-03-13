<?php

namespace App\Http\Controllers;

use App\Models\Ladu;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LaduController extends Controller
{
    public function index(){
        return Inertia::render('Ladus', [
            'ladus' => Ladu::all(),
        ]);
    }
}
