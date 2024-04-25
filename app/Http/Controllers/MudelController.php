<?php

namespace App\Http\Controllers;

use App\Models\Mudel;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MudelController extends Controller
{
    public function index()
    {
        return Inertia::render('Mudel/Index', [
            'mudel' => Mudel::all(),
        ]);
    }
}

