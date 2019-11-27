<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
       
        <title>{{ config('app.name', 'Laravel') }} || @yield('title')</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
       
        <link rel="stylesheet" type="text/css" media="all" href="{{asset('css/managerje.css')}}">
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
         </script>
        <script src="https://static.mod.io/html/external/tinymce/tinymce.min.js"></script>
    </head>
    <body id="app">
        <div id="appbar" class="background is-primary is-primary-gradient">
            @include('layouts.manage._includes.nav._nav1')
          
        </div>
   
        <div id="appcontent" class="background is-dark">
            @include('layouts.manage._includes.nav._nav2')
            @include('layouts.manage._includes.nav._nav3')
            @include('layouts.manage._includes.alert._alert')
            <div class="tabs tabsmenu background is-light is-boxed is-centered is-marginless is-hidden-tablet">
                    <ul>
                        <li class="{{$info=="pesan inbox"?'is-active':''}}">
                            <a href="{{route('pesan.index')}}">Inbox</a>
                        </li>
                        <li class="{{$info=="pesan sent"?'is-active':''}}">
                            <a href="{{route('pesan.sent')}}">Sent</a>
                        </li>
                        <li class="{{$info=="pesan compose"?'is-active':''}}">
                        <a  href="{{route('pesan.create')}}">Compose</a>
                        </li>
                        
                    </ul>
                </div>
          
        @yield('content')
            
        </div>
        @include('layouts.manage._includes.svg._svg') 
        <script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{asset('js/sortable.js')}}"></script>   
        {{-- <script src="{{asset('js/jquery.js')}}"></script> --}}
        <script src="{{asset('js/coursel.js')}}"></script>
  
        <script src="{{asset('js/ajax/ajaxpesanuser.js')}}"></script>
        <script src="{{asset('js/ajax/ajaxsearchm.js')}}"></script>
{{-- <script src="{{asset('js/jquery.js')}}"></script> --}}
<script src="{{asset('js/app.js')}}"></script>
@include('layouts.manage._includes.alert._notif')
@yield('scripts')
    </body>
</html>