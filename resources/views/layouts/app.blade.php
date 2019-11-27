


<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>

        <meta charset="utf-8">
   
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }} || @yield('title')</title>

        <link rel="stylesheet" type="text/css" media="all" href="{{asset('css/apprje.css')}}">
        <link rel="stylesheet" type="text/css" media="all" href="{{asset('css/app.css')}}">

        {{-- <link rel="stylesheet" href="https://static.mod.io/html/external/min/index.php?b=v1&amp;f=css/slick.css&amp;1" type="text/css"> --}}
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
         </script>
    </head>
    <body id="home">
            <section class="hero is-dark is-shadowless is-medium">
                    <div class="hero-head">
                        <div class="container">
                           @include('layouts.app._includes.nav._nav')
                        </div>
                    </div>
                    @if(Request::path()=='/')
                    @include('layouts.app._includes.hero._hero')
                    @endif
                </section>
    
       @yield('content')
       @include('layouts.app._includes.footer._footer')
       @include('layouts.app._includes.svg._svg')
     
       <script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
{{-- <script src="{{asset('js/jquery.js')}}"></script> --}}
<script src="{{asset('js/coursel.js')}}"></script>
<script src="{{asset('js/slick.js')}}"></script>
<script src="{{asset('js/ajax/ajaxsearcha.js')}}"></script>
<script src="{{asset('js/ajax/ajaxpesanuser.js')}}"></script>
<script src="{{asset('js/apprje.js')}}"></script>
{{-- <script src="{{asset('js/app.js')}}"></script> --}}

@yield('scripts')
</body></html>


