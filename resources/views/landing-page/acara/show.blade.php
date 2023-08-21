@extends('template.landing-page.app')

@section('title', $acara->judul)

@push('styles')
   <style>
      #hero {
         background-image: url("{{ $acara->thumbnail }}");
         background-size: contain;
      }

      #hero::after {
         content: "";
         height: 100%;
         width: 100%;
         background-color: rgba(0, 0, 0, .1);
         display: block;
      }
   </style>
@endpush

@section('content')
   @include('template.landing-page.partials._hero')

   <div class="container py-5">
      <div class="row">
         <div class="col-lg-12">
            <p class="fs-14 text-muted">{{ $acara->lokasi->nama }}</p>
            <h4>{{ $acara->judul }}</h4>
            <p class="fs-14 text-muted mb-1"><i class="fa-regular fa-calendar me-1"></i> {{ $acara->waktu_mulai->translatedFormat('d M Y H:i') }} <i class="fa-solid fa-circle ms-2 me-1"></i> {{ $acara->durasi_menit_estimasi.' menit' }}</p>
            <p class="fs-14 text-muted">Kuota : {{ $acara->kuota }}</p>

            <hr class="my-5">
            
            <div class="row">
               <div class="col-lg-6">
                  <h5 class="mb-3">Deskripsi</h5>
                  <p class="fs-14">{{ $acara->deskripsi }}</p>
               </div>
               <div class="col-lg-6">
                  <h5 class="mb-3">Peraturan</h5>
                  <p class="fs-14">{{ $acara->deskripsi }}</p>
               </div>
            </div>

            <hr class="my-5">

            <h5 class="mb-3">Beli Tiket</h5>
            <a href="" class="btn btn-sm btn-primary">Gratis</a>
            <a href="" class="btn btn-sm btn-outline-primary">Berbayar</a>
         </div>
      </div>
   </div>
@endsection