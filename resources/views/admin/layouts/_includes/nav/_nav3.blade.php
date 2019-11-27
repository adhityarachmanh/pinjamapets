<?php 
use App\Kategori;
use App\Barang;
use App\Sewa;
?>
<nav class="navbar navbartooltips has-shadow is-dark-mobile">
    <div class="navbar-brand">
        <a href="https://meeplestation.mod.io" class="navbar-item navbar-logo is-hidden-tablet" style="margin-right: auto;">
        <img src="{{asset('images/logo.png')}}" alt="Meeple Station">
        </a>
        <a href="https://mod.io/members/adhityarachman58" class="navbar-item is-paddingleft is-hidden-tablet">adhityarachman58</a>
        <div class="navbar-burger burger" style="margin-left: 0;">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="navbar-menu">
        <div class="navbar-start">
        <a class="navbar-item is-paddingless" href="{{route('admin.dashboard')}}">
                <span class="icon">
                    <svg class="fa icon-light-home" aria-label="Home">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-light-home"></use>
                    </svg>
                </span>
            </a>
           
        </div>
        
        <div class="navbar-end">
                <a href="{{route('manage-pesan.index')}}" class="navbar-item csstooltip is-hidden-mobile" original-title="Pesan Baru" id="pesan-unread-wadah" style="display:none;">
                    <span id="pesan-unread" class="icon messagescount badge badge-danger badge-empty is-top is-small" >
                        <svg class="fa icon-light-envelope">
                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-light-envelope"></use>
                    </svg>
                </span>
            </a>
            <div class="navbar-item has-dropdown is-hoverable">
            
                
                <a  class="navbar-item">
                    
                  {{"Admin ".Auth::User()->name}}	<figure class="avatar image is-top is-32x32 is-hidden-mobile">
                  <img src="{{filter_var(Auth::User()->foto, FILTER_VALIDATE_URL)?Auth::User()->foto : asset('images/user/'.Auth::User()->id.'/foto/'.Auth::User()->foto)}}" onerror='this.src="{{asset("images/user.png")}}"'></figure>
                                              </a>
              <div class="navbar-dropdown is-boxed is-right">
            
              <a href="{{route('admin.logout')}}"  class="navbar-item">Logout</a>
              
                 </div>
               
                </div>
            </div>
        </div>
  
</nav>