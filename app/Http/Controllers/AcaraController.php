<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Acara;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Helpers\CustomHelpers;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AcaraRequest;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class AcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.acara.index');
    }

    public function datatableJson()
    {
        $data = Acara::query();

        return DataTables::of($data)
                            ->editColumn('thumbnail', function($data) {
                                $thumbnail = ($data->thumbnail ?: asset('img/no_image.jpeg'));

                                return '<img src="'.$thumbnail.'" width="100">';
                            })
                            ->editColumn('waktu_mulai', function($data) {
                                $waktu_mulai = $data->waktu_mulai->format('d/m/Y H:i');
                                $estimasi_durasi = $data->durasi_menit_estimasi.' menit';

                                return $waktu_mulai.' <span class="badge badge-primary">'.$estimasi_durasi.'</span>';
                            })
                            ->addColumn('status', function($data) {
                                $status = ($data->is_pending ? '<span class="badge badge-secondary">Pending</span>' : '<span class="badge badge-success">Terkonfirmasi</span>');

                                return $status;
                            })
                            ->addColumn('aksi', function($data) {
                                return '
                                    <a href="'.route('dashboard.acara.edit', $data->id).'" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="'.route('dashboard.acara.edit', $data->id).'" class="btn btn-sm btn-info">Detail</a>
                                    <a href="'.route('dashboard.jenis-tiket.index', $data->id).'" class="btn btn-sm btn-success">Kelola Tiket</a>
                                ';
                            })
                            ->rawColumns(['aksi', 'thumbnail', 'waktu_mulai', 'status'])
                            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = DB::table('kategori')->orderBy('nama')->get();
        $lokasi = DB::table('lokasi')->orderBy('nama')->get();
        $kampus = DB::table('kampus')->orderBy('nama')->get();

        return view('dashboard.acara.create', compact('kategori', 'lokasi', 'kampus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AcaraRequest $request)
    {
        $slug = Str::slug($request->judul);

        DB::beginTransaction();

        try {
            // cek apakah slug sudah ada
            $count_slug = DB::table('acara')->select('id')->where('slug', '=', $slug)->count();

            if($count_slug) {
                $slug = $slug.'-'.($count_slug + 1);
            }

            $thumbnail = $request->thumbnail ? CustomHelpers::uploadImage($request->thumbnail, 'thumbnail') : null;
            $foto_stage = $request->foto_stage ? CustomHelpers::uploadImage($request->foto_stage, 'foto_stage') : null;

            Acara::create([
                'lokasi_id' => $request->lokasi_id,
                'kategori_id' => $request->kategori_id,
                'user_id' => auth()->user()->id,
                'kampus_id' => ($request->kampus_id ?: null),
                'judul' => $request->judul,
                'thumbnail' => $thumbnail,
                'deskripsi' => $request->deskripsi,
                'waktu_mulai' => $request->waktu_mulai,
                'durasi_menit_estimasi' => $request->durasi_menit_estimasi,
                'slug' => $slug,
                'kuota' => $request->kuota,
                'dress_code' => $request->dress_code,
                'is_pending' => 0,
                'peraturan' => $request->peraturan,
                'foto_stage' => $foto_stage,
                'keterangan' => $request->keterangan
            ]);

            DB::commit();

            return redirect()->route('dashboard.acara.index')->with('success', 'Data berhasil disimpan');
        } catch (Exception $e) {
            DB::rollback();

            // delete file
            if($thumbnail) {
                CustomHelpers::deleteImage($thumbnail, 'thumbnail');
            }

            if($foto_stage) {
                CustomHelpers::deleteImage($foto_stage, 'foto_stage');
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
    public function edit(Acara $acara)
    {
        $kategori = DB::table('kategori')->orderBy('nama')->get();
        $lokasi = DB::table('lokasi')->orderBy('nama')->get();
        $kampus = DB::table('kampus')->orderBy('nama')->get();

        return view('dashboard.acara.edit', compact('kategori', 'lokasi', 'acara', 'kampus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AcaraRequest $request, Acara $acara)
    {
        $slug = Str::slug($request->judul);

        DB::beginTransaction();

        try {
            // cek apakah slug sudah ada
            $count_slug = DB::table('acara')
                            ->select('id')
                            ->where('slug', '=', $slug)
                            ->where('id', '!=', $acara->id)
                            ->count();

            if($count_slug) {
                $slug = $slug.'-'.($count_slug + 1);
            }

            $thumbnail = $acara->thumbnail;
            $foto_stage = $acara->foto_stage;

            if($request->thumbnail) {
                CustomHelpers::deleteImage($thumbnail, 'thumbnail');
                $thumbnail = CustomHelpers::uploadImage($request->thumbnail, 'thumbnail');
            }

            if($request->foto_stage) {
                CustomHelpers::deleteImage($foto_stage, 'foto_stage');
                $foto_stage = CustomHelpers::uploadImage($request->foto_stage, 'foto_stage');
            }

            $acara->update([
                'lokasi_id' => $request->lokasi_id,
                'kategori_id' => $request->kategori_id,
                'kampus_id' => ($request->kampus_id ?: null),
                'judul' => $request->judul,
                'thumbnail' => $thumbnail,
                'deskripsi' => $request->deskripsi,
                'waktu_mulai' => $request->waktu_mulai,
                'durasi_menit_estimasi' => $request->durasi_menit_estimasi,
                'slug' => $slug,
                'kuota' => $request->kuota,
                'dress_code' => $request->dress_code,
                'peraturan' => $request->peraturan,
                'foto_stage' => $foto_stage,
                'keterangan' => $request->keterangan
            ]);

            DB::commit();

            return redirect()->route('dashboard.acara.index')->with('success', 'Data berhasil disimpan');
        } catch (Exception $e) {
            DB::rollback();

            // delete file
            if($thumbnail) {
                CustomHelpers::deleteImage($thumbnail, 'thumbnail');
            }

            if($foto_stage) {
                CustomHelpers::deleteImage($foto_stage, 'foto_stage');
            }

            return redirect()->back()->with('error', 'Data gagal disimpan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Acara $acara)
    {
        $acara->delete();

        return response()->json([
            'message' => 'Data berhasil dihapus'
        ], 200);
    }

    public function landingPageShow($slug)
    {
        $acara = Acara::with('lokasi')->where('slug', '=', $slug)->firstOrFail();

        return view('landing-page.acara.show', compact('acara'));
    }
}
