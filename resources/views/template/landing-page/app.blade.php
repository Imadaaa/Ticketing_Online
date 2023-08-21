<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EasyIN - @yield('title')</title>
    
    @include('template.landing-page.partials._style')
</head>

<body class="bg-light">
    {{-- navbar --}}
    @include('template.landing-page.partials._navbar')
    
    @yield('content')

    {{-- footer --}}
    @include('template.landing-page.partials._footer')    

    @include('template.landing-page.partials._script')
</body>

</html>
