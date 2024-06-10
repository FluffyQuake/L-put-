<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Ladu;
use App\Models\Mudel;
use App\Models\Sisestamine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use League\CommonMark\Node\Block\Document;
use Symfony\Contracts\Service\Attribute\Required;

class SisestamineController extends Controller  
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Mudel::get());
        return Inertia::render('Sisestamine/Index', [
            'sisestamine' => Sisestamine::all(),
            'devices' => Device::get(),
            'mudels' => Mudel::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Sisestamine/Create', [

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'SN' => 'required|max:25',
            'device_id' => 'required',
            'mudel_id' => 'required',
            'description' => 'required',
            'condition' => 'required',
            'shelf' => 'required',
            'shop' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
        ])->validate();
        
        $SN = $request->input('SN');
        $device = $request->input('device_id');
        $mudel = $request->input('mudel_id');
        $description = $request->input('description');
        $condition = $request->input('condition');
        $shelf = $request->input('shelf');
        $shop = $request->input('shop');
        $image = Storage::putFile('public/sisestamine', $request->file('image'));
        $image = str_replace('public/sisestamine', 'sisestamine', $image);
        
        // dd($SN);
        // dd($device);
        // dd($mudel);
        // dd($description);
        // dd($condition);
        // dd($shelf);
        // dd($shop);
        // dd($image);

        Sisestamine::create([
            'SN' => $SN,
            'device_id' => $device,
            'mudel_id' => $mudel,
            'description' => $description,
            'condition' => $condition,
            'shelf' => $shelf,
            'shop' => $shop,
            'image_path' => $image,
            // $request->all()
        ]);

        return redirect()->route('ladu');

    }

    /**
     * Display the specified resource.
     */
    public function show(Sisestamine $sisestamine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sisestamine $sisestamine)
    {
        // return Inertia::render('ladu.edit', [
        //     'sisestamine' => $sisestamine,
        //     'ladu' => Ladu::all()
        // ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sisestamine $sisestamine)
    {
        $request->validate([
            'SN' => 'required',
            'device_id' => 'required',
            'mudel_id' => 'required',
            'description' => 'required',
            'condition' => 'required',
            'shelf' => 'required',
            'shop' => 'required',
            'image_path' => 'required|image',
        ]);
    
        Storage::delete($sisestamine->image_path);
        $path = Storage::putFile('ladu', $request->file('image_path'));

        $sisestamine->update([
            'SN' => $request['SN'],
            'device_id' => $request['device_id'],
            'mudel_id' => $request['mudel_id'],
            'description' => $request['description'],
            'condition' => $request['condition'],
            'shelf' => $request['shelf'],
            'shop' => $request['shop'],
            'image_path' => $path,
        ]);

    return redirect()->route('ladu');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Sisestamine::find($request['id'])->delete();

    }
}
