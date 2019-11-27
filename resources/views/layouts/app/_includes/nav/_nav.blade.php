<nav class="navbar inverttooltips navbartooltips is-dark">
    <div class="navbar-brand">
        <a href="/" class="navbar-item navbar-logo" style="margin-right: auto;">
            <img src="{{asset('images/logo.png')}}" alt="mod.io">
        </a>
    <a href="{{route('login')}}" class="navbar-item thickbox is-hidden-tablet is-paddingless" rel="iframe=true;innerHeight=640;innerWidth=800" target="_self">Login</a>
        <div class="navbar-burger burger" style="margin-left: 0;">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
   
    <div class="navbar-menu">
        <div class="navbar-start">
            <div class="menuadd navbar-item has-dropdown is-hoverable">
                <a href="/" class="navbar-item">Home</a>
               
            </div>
           
            
            <div class="dropdown is-hoverable">
           
            <a href="{{route('slug.converter',['status'=>'items','slug'=>'all'])}}" class="navbar-item is-hidden-tablet-only">Produk</a>
            
                <div class="dropdown-menu" id="dropdown-menu m-t--10" role="menu" style="margin-top:-20px;">
                  <div class="dropdown-content">
                    <div class="dropdown-item">
                        <?php 
                        use App\Kategori;
                        $kategoris=Kategori::all();    
                        ?>
                        @foreach($kategoris as $k)
                    <a href="{{route('slug.converter',['status'=>'kategori','slug'=>$k->slug])}}" class="navbar-item is-hidden-tablet-only is-capitalized">{{$k->nama}}</a>
                        @endforeach
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <div class="navbar-end">
           
        <a href="{{route('login')}}" class="navbar-item thickbox is-guest is-hidden-tablet" rel="iframe=true;innerHeight=640;innerWidth=800" target="_self">Login</a>
            <a href="{{route('register')}}" class="navbar-item thickbox is-guest is-hidden-tablet" rel="iframe=true;innerHeight=640;innerWidth=800" target="_self">Sign Up</a>
            @if(Auth::Guest())
            <div class="navbar-item is-hidden-mobile is-paddingless is-guest">
            <a href="{{route('login')}}"  class="button thickbox is-text is-nolink is-uppercase" rel="iframe=true;innerHeight=640;innerWidth=800" target="_self">
                    <span class="icon is-small">
                        <svg class="fa icon-light-sign-in">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-light-sign-in"></use>
                        </svg>
                    </span>
                    <span>Login</span>
                </a>
               
            </div>
            <span class="navbar-item is-hidden-mobile is-paddingless is-guest">atau</span>
            <div class="navbar-item is-hidden-mobile is-guest">
                <a href="{{route('register')}}" class="button thickbox is-primary is-uppercase" rel="iframe=true;innerHeight=640;innerWidth=800" target="_self">Daftar</a>
            </div>
        @else
        <!-- kalo udah login -->
        <a href="{{route('pesan.index')}}" class="navbar-item csstooltip is-hidden-mobile" original-title="Pesan Baru" id="pesan-unread-wadah" style="display:none;">
                <span id="pesan-unread" class="icon messagescount badge badge-danger badge-empty is-top is-small" >
                    <svg class="fa icon-light-envelope">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-light-envelope"></use>
                </svg>
            </span>
        </a>
        <div class="navbar-item has-dropdown is-hoverable">
            
        <a href="{{route('user.edit',Auth::User()->id)}}" class="navbar-item">
                @include('layouts.manage._includes.status._status')
                {{Auth::user()->name}}	<figure class="avatar image is-top is-32x32 is-hidden-mobile">
                <img src="{{Auth::User()->status_login!=null?Auth::User()->foto : asset('images/user/'.Auth::User()->id.'/foto/'.Auth::User()->foto)}}" onerror='this.src="{{asset("images/user.png")}}"' alt="{{Auth::User()->name}}"></figure>
                                            </a>
            <div class="navbar-dropdown is-boxed is-right">
                    <a href="{{route('pesan.index')}}" class="navbar-item">Pesan</a>
                <a href="{{route('user.index',Auth::User()->id)}}" class="navbar-item">Profile</a>
            <a  onclick="document.getElementById('logout-form').submit();" class="navbar-item">Logout</a>
                                                @include('layouts.app._includes.form.logout')
            </div>
        </div>
        @endif
    
        </div>
    </div>
</nav>
             

    
   

