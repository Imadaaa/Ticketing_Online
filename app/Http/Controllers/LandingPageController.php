<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Kampus;
use App\Models\Kategori;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $kategori = Kategori::take(5)->get();
        $kampus = Kampus::take(3)->get();
        $acara = Acara::with(['lokasi', 'jenisTiketGratis', 'jenisTiketBerbayar.tiketBerbayarStartFrom'])->orderBy('waktu_mulai', 'desc')->take(8)->get();

        return view('landing-page.index', compact('kategori', 'kampus', 'acara'));
    }
}
