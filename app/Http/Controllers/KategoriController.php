<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Http\Requests\KategoriRequest;
use Yajra\DataTables\Facades\DataTables;

class KategoriController extends Controller
{
    public function landingPageIndex()
    {
        return view('landing-page.kategori.index');
    }

    public function datatableJson()
    {
        $data = Kategori::query();

        return DataTables::of($data)
                            ->addColumn('aksi', function($data) {
                                return '
                                    <a href="'.route('dashboard.kategori.edit', $data->id).'" class="btn btn-sm btn-warning">Edit</a>
                                    <button type="button" class="btn btn-sm btn-danger" data-id="'.$data->id.'">Hapus</button>
                                ';
                            })
                            ->rawColumns(['aksi'])
                            ->toJson();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.kategori.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KategoriRequest $request)
    {
        Kategori::create($request->only('nama'));

        return redirect()->route('dashboard.kategori.index')->with('success', 'Data berhasil disimpan');
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
    public function edit(Kategori $kategori)
    {
        return view('dashboard.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KategoriRequest $request, Kategori $kategori)
    {
        $kategori->update($request->only('nama'));

        return redirect()->route('dashboard.kategori.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return response()->json([
            'message' => 'Data berhasil dihapus'
        ], 200);
    }
}
