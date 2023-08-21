<?php

namespace App\Http\Controllers;

use App\Models\Kampus;
use Illuminate\Http\Request;
use App\Helpers\CustomHelpers;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\KampusRequest;
use Yajra\DataTables\Facades\DataTables;

class KampusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.kampus.index');
    }

    public function datatableJson()
    {
        $data = Kampus::query();

        return DataTables::of($data)
                            ->editColumn('thumbnail', function($data) {
                                $thumbnail = ($data->thumbnail ?: asset('img/no_image.jpeg'));

                                return '<img src="'.$thumbnail.'" width="100">';
                            })
                            ->addColumn('aksi', function($data) {
                                return '
                                    <a href="'.route('dashboard.kampus.edit', $data->id).'" class="btn btn-sm btn-warning">Edit</a>
                                    <button type="button" class="btn btn-sm btn-danger" data-id="'.$data->id.'">Hapus</button>
                                ';
                            })
                            ->rawColumns(['aksi', 'thumbnail'])
                            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lokasi = DB::table('lokasi')->orderBy('nama')->get();

        return view('dashboard.kampus.create', compact('lokasi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KampusRequest $request)
    {
        DB::beginTransaction();

        try {
            $thumbnail = $request->thumbnail ? CustomHelpers::uploadImage($request->thumbnail, 'thumbnail') : null;

            Kampus::create([
                'lokasi_id' => $request->lokasi_id,
                'nama' => $request->nama,
                'thumbnail' => $thumbnail
            ]);

            DB::commit();

            return redirect()->route('dashboard.kampus.index')->with('success', 'Data berhasil disimpan');
        } catch (Exception $e) {
            DB::rollback();

            // delete file
            if($thumbnail) {
                CustomHelpers::deleteImage($thumbnail, 'thumbnail');
            }

            return redirect()->back()->with('error', 'Data gagal disimpan');
        }
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
    public function edit(Kampus $kampus)
    {
        $lokasi = DB::table('lokasi')->orderBy('nama')->get();

        return view('dashboard.kampus.create', compact('lokasi', 'kampus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KampusRequest $request, Kampus $kampus)
    {
        DB::beginTransaction();

        try {
            if($request->thumbnail) {
                CustomHelpers::deleteImage($kampus->thumbnail, 'thumbnail');
            }

            $thumbnail = $request->thumbnail ? CustomHelpers::uploadImage($request->thumbnail, 'thumbnail') : $kampus->thumbnail;

            $kampus->update([
                'lokasi_id' => $request->lokasi_id,
                'nama' => $request->nama,
                'thumbnail' => $thumbnail
            ]);

            DB::commit();

            return redirect()->route('dashboard.kampus.index')->with('success', 'Data berhasil disimpan');
        } catch (Exception $e) {
            DB::rollback();

            // delete file
            if($thumbnail) {
                CustomHelpers::deleteImage($thumbnail, 'thumbnail');
            }

            return redirect()->back()->with('error', 'Data gagal disimpan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kampus $kampus)
    {
        $kampus->delete();

        CustomHelpers::deleteImage($kampus->thumbnail, 'thumbnail');

        return response()->json([
            'message' => 'Data berhasil dihapus'
        ], 200);
    }

    public function getApiDetail(Kampus $kampus)
    {
        return response()->json([
            'data' => $kampus,
            'message' => 'Data berhasil ditampilkan'
        ], 200);
    }
}
