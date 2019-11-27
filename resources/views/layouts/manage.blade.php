


<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }} || @yield('title')</title>

        <link rel="stylesheet" type="text/css" media="all" href="{{asset('css/managerje.css')}}">
        <link rel="stylesheet" type="text/css" media="all" href="{{asset('css/app.css')}}">
    @yield('csskhusus')
        {{-- <link rel="stylesheet" href="https://static.mod.io/html/external/min/index.php?b=v1&amp;f=css/slick.css&amp;1" type="text/css"> --}}
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
         </script>

       
    </head>
    <body id="home">
        
    <section >
        <div id="appbar" class="background is-primary is-primary-gradient">
                @include('layouts.manage._includes.nav._nav1')
            </div>
                <div id="appcontent" class="background is-dark">
                 @include('layouts.manage._includes.nav._nav2')
                @include('layouts.manage._includes.nav._nav3')
                @include('layouts.manage._includes.alert._alert')
                <section class="wrapper">    
                @yield('content')
                </section>
                </div>
          
        </section>
     
       @include('layouts.manage._includes.svg._svg') 
       <script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>


<script src="{{asset('js/sortable.js')}}"></script>   
{{-- <script src="{{asset('js/jquery.js')}}"></script> --}}
<script src="{{asset('js/coursel.js')}}"></script>
<script src="{{asset('js/slick.js')}}"></script>
<script src="{{asset('js/managerje.js')}}"></script>
<script src="{{asset('js/ajax/ajaxsearchm.js')}}"></script>
<script src="{{asset('js/ajax/ajaxpesanuser.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
@include('layouts.manage._includes.alert._notif')
@yield('scripts')

</body></html>


