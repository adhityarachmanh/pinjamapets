<nav class="navbar navbartooltips has-shadow is-dark-mobile">
        @if(Auth::check())
    <div class="navbar-brand">
        <a href="/" class="navbar-item navbar-logo is-hidden-tablet" style="margin-right: auto;">
          
        <img src="{{filter_var(Auth::User()->foto, FILTER_VALIDATE_URL)?Auth::User()->foto : asset('images/user/'.Auth::User()->id.'/foto/'.Auth::User()->foto)}}" onerror='this.src="{{asset("images/user.png")}}"'>
     
    </a>
    <a href="h" class="navbar-item is-paddingleft is-hidden-tablet">{{Auth::User()->name}}</a>
        <div class="navbar-burger burger" style="margin-left: 0;">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    @endif
    <div class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item is-paddingless" href="https://">
                <span class="icon">
                    <svg class="fa icon-light-home" aria-label="Home">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-light-home"></use>
                    </svg>
                </span>
            </a>
            <a class="navbar-item" href="/">Home</a>
            <span class="navbar-item is-paddingless">/</span>
           <a class="navbar-item is-capitalized">{{$info}}</a>
        </div>
   
        <div class="navbar-end">
                <a href="{{route('pesan.index')}}" class="navbar-item csstooltip is-hidden-mobile" original-title="Pesan Baru" id="pesan-unread-wadah" style="display:none;">
                        <span id="pesan-unread" class="icon messagescount badge badge-danger badge-empty is-top is-small" >
                            <svg class="fa icon-light-envelope">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-light-envelope"></use>
                        </svg>
                    </span>
                    </a>
            <div class="navbar-item has-dropdown is-hoverable">
               @if(Auth::guest())
               <a href="{{route('login')}}" class="navbar-item thickbox is-hidden-tablet is-guest" rel="iframe=true;innerHeight=640;innerWidth=800" target="_self">Login</a>
               <a href="{{route('register')}}" class="navbar-item thickbox is-hidden-tablet is-guest" rel="iframe=true;innerHeight=640;innerWidth=800" target="_self">Sign Up</a>
               <div class="navbar-item is-hidden-mobile is-paddingless is-guest">
                  <a href="{{route('login')}}" class="button thickbox is-text is-nolink is-uppercase" rel="iframe=true;innerHeight=640;innerWidth=800" target="_self"><span class="icon is-small"><svg class="fa icon-light-sign-in"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-light-sign-in"></use></svg></span><span>Login</span></a>
               </div>
               <span class="navbar-item is-hidden-mobile is-paddingless is-guest">atau</span>
               <div class="navbar-item is-hidden-mobile is-paddingleft is-guest">
                  <a href="{{route('register')}}" class="button thickbox is-primary is-uppercase" rel="iframe=true;innerHeight=640;innerWidth=800" target="_self">Sign Up</a>
               </div>
                      
               @else
              
               <a  class="navbar-item">
                  
                @include('layouts.manage._includes.status._status')
                 {{Auth::user()->name}}	<figure class="avatar image is-top is-32x32 is-hidden-mobile">
                 <img src="{{Auth::User()->status_login!=null?Auth::User()->foto : asset('images/user/'.Auth::User()->id.'/foto/'.Auth::User()->foto)}}" onerror='this.src="{{asset("images/user.png")}}"' alt="{{Auth::User()->name}}"></figure>
                                             </a>
             <div class="navbar-dropdown is-boxed is-right">
             <a href="{{route('pesan.index')}}" class="navbar-item">Pesan</a>
             <a href="{{route('user.index')}}" class="navbar-item">Profile</a>
                    <a href="#" onclick="document.getElementById('logout-form').submit();" class="navbar-item">Logout</a>
                    @include('layouts.manage._includes.form.logout')
                </div>
                @endif
            </div>
        </div>
    </div>
    
</nav>
