<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function getIndex()
    {
        $acara_count = DB::table('acara')->select('id')->count();
        $user_count = DB::table('users')->where('role', '=', 'user')->select('id')->count();
        $lokasi_count = DB::table('lokasi')->select('id')->count();
        $kategori_count = DB::table('kategori')->select('id')->count();
        $kampus_count = DB::table('kampus')->select('id')->count();
        $metode_pembayaran_count = DB::table('metode_pembayaran')->select('id')->count();

        return view('dashboard.index', compact('metode_pembayaran_count', 'acara_count', 'user_count', 'lokasi_count', 'kategori_count', 'kampus_count'));
    }
}
