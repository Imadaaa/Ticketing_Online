@extends('template.dashboard.app')

@section('title', 'Acara')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Acara</h1>
    
    @include('dashboard.acara.partials._form')
@endsection