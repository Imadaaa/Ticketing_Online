@extends('template.landing-page.app')

@section('title', 'Beranda')

@section('content')
    @include('template.landing-page.partials._hero')

    <div class="container py-5">
        {{-- Kategori --}}
        <div class="row mt-4">
            <div class="col-lg-12">
                <h4>Kategori</h4>
                <div class="d-flex justify-content-between">
                    <p class="fs-14">Nikmatin acara dengan kategori kesukaan kamu</p>
                    <a href="{{ route('landing-page.kategori.index') }}" class="fs-12 text-primary text-decoration-none">Lihat Semua</a>
                </div>
                <div class="row">
                    @forelse($kategori as $k)
                        <div class="col-lg-2 d-grid">
                            <a href="" class="btn btn-primary fs-14 shadow-sm">{{ $k->nama }}</a>
                        </div>
                    @empty
                        <div class="col-lg-12 text-center">
                            <p class="fs-14 text-muted">Belum ada data</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    
        {{-- Kegiatan Kampus --}}
        <div class="row mt-5" id="kegiatan-kampus">
            <div class="col-lg-12 mt-3">
                <h4>Kegiatan Kampus</h4>
                <div class="d-flex justify-content-between">
                    <p class="fs-14">Nikmatin acara kegiatan universitas</p>
                    <a href="" class="fs-12 text-primary text-decoration-none">Lihat Semua</a>
                </div>
                <div class="row d-flex">
                    @forelse ($kampus as $k)
                        <div class="col-lg-4">
                            <div class="card border-0 h-100" style="background-image: url('{{ $k->thumbnail ?: asset('img/no_image.jpeg') }}')">
                                <div class="card-body shadow-sm text-center text-white">
                                    <h5 class="fw-700">{{ $k->nama }}</h5>
                                    <p class="fs-14">Cari kegiatan di kampus ini</p>
                                    <a href="" class="btn btn-sm btn-primary fs-14">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-lg-12 text-center">
                            <p class="fs-14 text-muted">Belum ada data</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    
        {{-- Acara Terbaru --}}
        <div class="row mt-5" id="acara-terbaru">
            <div class="col-lg-12 mt-3">
                <h4>Acara Terbaru</h4>
                <div class="d-flex justify-content-between">
                    <p class="fs-14">Acara yang mungkin cocok untuk kamu</p>
                    <a href="" class="fs-12 text-primary text-decoration-none">Lihat Semua</a>
                </div>
                <div class="row">
                    @forelse ($acara as $a)
                        <div class="col-lg-3 mb-3">
                            <div class="card border-0">
                                <div class="card-body shadow-sm py-3">
                                    <img src="{{ $a->thumbnail ?: asset('img/no_image.jpeg') }}" class="img-fluid">
                                    <h6 class="fs-14 fw-700 mt-3">{{ $a->judul }}</h6>
                                    <p class="fs-12 text-muted mb-0">{{ $a->waktu_mulai->translatedFormat('d M Y H:i') }}</p>
                                    <p class="fs-12 text-muted">{{ $a->lokasi->nama }}</p>
                                    
                                    <div class="deskripsi d-flex">
                                        <div>
                                            <i class="fa-solid fa-hourglass-start fs-12"></i>
                                            <span class="fs-12">{{ $a->durasi_menit_estimasi }}</span>
                                        </div>
                                        <div class="ms-4">
                                            <i class="fa-solid fa-eye fs-12"></i>
                                            <span class="fs-12">{{ $a->view_count }}</span>
                                        </div>
                                        <div class="ms-4">
                                            <i class="fa-solid fa-users fs-12"></i>
                                            <span class="fs-12">{{ $a->kuota }}</span>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="d-flex mt-3 justify-content-between align-items-end">
                                        @if($a->jenisTiketBerbayar()->exists())
                                            <div>
                                                <p class="mb-0 fs-12">Mulai dari</p>
                                                <h6 class="mb-0"><span class="fw-700">Rp</span> <span class="fs-12">{{ number_format($a->jenisTiketBerbayar->tiketBerbayarStartFrom->harga) }}</span> @if($a->jenisTiketGratis()->exists()) <span class="fs-12">| Gratis</span> @endif</h6>
                                            </div>
                                        @else
                                            <div>
                                                <p class="mb-0 fs-12">Gratis</p>
                                            </div>
                                        @endif
                                        <div>
                                            <a href="{{ route('landing-page.acara.show', $a->slug) }}" class="btn btn-sm btn-primary fs-12">Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-lg-12 text-center">
                            <p class="fs-14 text-muted">Belum ada data</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection