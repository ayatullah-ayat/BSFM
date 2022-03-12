<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) ?? 'en' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title','Micro Media')</title>

    {{-- libs css goes here --}}
    <link rel="stylesheet" href="{{ asset('assets/frontend/libs/bootstrap5/bootstrap5.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/frontend/libs/fontawesome6/all.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    {{-- main css goes here --}}
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/master.css') }}">

    @stack('css')

</head>

<body>

    {{-- -------- header -------------------------------  --}}
    @includeIf('frontend.layouts.partials.topbar')
    @includeIf('frontend.layouts.partials.header')
    {{-- -------- header -------------------------------  --}}

    {{-- ------------- content area ---------------------------  --}}
    @hasSection('content')
        @yield('content')
    @endIf
    
    @sectionMissing('content')
        <div class="py-5 mx-5">
            <h2 class="text-center text-uppercase font-weight-bold display-5 alert alert-danger alert-heading">No content Found</h2>
        </div>
    @endIf
    {{-- ------------- content area ---------------------------  --}}

    {{-- -------- footer ------------------------------- --}}
    @includeIf('frontend.layouts.partials.footer')
    {{-- -------- footer ------------------------------- --}}

</body>

<script src="{{ asset('assets/common_assets/libs/jquery/jquery.min.js') }}"> </script>
<script src="{{ asset('assets/frontend/libs/bootstrap5/boostrap5.bundle.min.js') }}"></script>
<script src="{{ asset('frontend/libs/fontawesome6/all.min.js') }}"></script>
@stack('js')

</html>