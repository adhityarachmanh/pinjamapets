<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
     
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }} || @yield('title')</title>
        <link rel="stylesheet" type="text/css" media="all" href="{{asset('css/managerje.css')}}">

        <link rel="stylesheet" type="text/css" media="all" href="{{asset('css/app.css')}}">

        <script>
                window.Laravel = {!! json_encode([
                    'csrfToken' => csrf_token(),
                ]) !!};
             </script>
              <script src="https://static.mod.io/html/external/tinymce/tinymce.min.js"></script>
    </head>
    
    <body id="home">
            <div id="appbar" class="background is-primary is-primary-gradient">
                    @include('admin.layouts._includes.nav._nav1')
                  
                </div>
           
                <div id="appcontent" class="background is-dark">
                        @include('admin.layouts._includes.nav._nav2')
                        @include('admin.layouts._includes.nav._nav3')
              

                  
               
                        @yield('content')
                </div>
           
                
        @include('layouts.manage._includes.svg._svg') 
        <script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{asset('js/ajax/ajaxadmin.js')}}"></script>
        <script src="{{asset('js/ajax/ajaxpesanadmin.js')}}"></script>
        @yield('scripts')
            <script src="{{asset('js/app.js')}}"></script>
            @include('layouts.manage._includes.alert._notif')
       
    </body>
</html>