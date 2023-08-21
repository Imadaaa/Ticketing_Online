<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\JenisTiket;
use Illuminate\Http\Request;

class JenisTiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Acara $acara)
    {
        $tiket_gratis = JenisTiket::withCount('tiket')->where('acara_id', '=', $acara->id)->where('is_free', '=', true)->first();
        $tiket_berbayar = JenisTiket::withCount('tiket')->where('acara_id', '=', $acara->id)->where('is_free', '=', false)->first();

        $jenis_tiket = ($request->jenis ? $request->jenis : 'gratis');

        return view('dashboard.acara.tiket.index', compact('acara', 'tiket_gratis', 'tiket_berbayar', 'jenis_tiket')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Acara $acara)
    {
        JenisTiket::create([
            'acara_id' => $acara->id,
            'is_free' => $request->is_free,
            'keuntungan' => $request->keuntungan
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
