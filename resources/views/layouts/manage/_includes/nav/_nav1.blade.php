

<nav class="navbar is-primary">
        <div class="navbar-brand">
           <a href="/" class="navbar-item is-paddingless">
              <span class="icon is-large">
                 <svg class="fa icon-custom-modio" aria-label="mod.io">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-custom-modio"></use>
                 </svg>
              </span>
           </a>
        </div>
     </nav>
     <div class="navscroll is-scrollable inverttooltips">
        <div class="navscroll-content">
           <div class="field fieldsortable is-marginless">
              @if($info=="pesan inbox" || $info=="pesan compose" ||$info=="pesan sent" ||$info=="pesan subjek")
             @if($info=="pesan inbox" || $info=="pesan sent")
              <a data-id="messages" class="field is-active">
                 <span class="image csstooltipside is-opaque75 is-32x32" title="Messages">
                    <span class="icon is-medium is-centered-text">
                       <svg class="fa icon-light-inbox">
                          <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-light-inbox"></use>
                       </svg>
                    </span>
                 </span>
              </a>
              @elseif($info=="pesan compose")
              <a data-id="messages" class="field is-active">
              <span class="image csstooltipside is-opaque75 is-32x32" original-title="Messages">
                  <span class="icon is-medium is-centered-text">
                      <svg class="fa icon-light-envelope">
                          <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-light-envelope">
                        </use>
                    </svg>
                </span>
              </span>
            </span>
              @endif
              @elseif($info=="profile"||$info=="reset password"||$info=="edit profile")
         <a href="{{route('user.index')}}" data-id="member" class="field is-active">
              <span class="image csstooltipside is-32x32" original-title="{{Auth::User()->name}}">
                <img src="{{Auth::User()->status_login!=null?Auth::User()->foto : asset('images/user/'.Auth::User()->id.'/foto/'.Auth::User()->foto)}}" onerror='this.src="{{asset("images/user.png")}}"' alt="{{Auth::User()->name}}">
                </span>
                </a>
                
            
         
              @else
              <a  data-id="1" class="field is-active">
              <span class="image csstooltipside is-32x32" title="Barang">
              <img src="{{asset('images/shopping-bag.png')}}" >
              </span>
              </a> 
              @endif
              <div class="field fieldfake" data-id="fake"></div>
           </div>
           <div class="field fieldremove">
              <span class="image remove is-32x32">
                 <span class="icon is-medium is-centered-text">
                    <svg class="fa icon-light-times" aria-label="Remove shortcut">
                       <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-light-times"></use>
                    </svg>
                 </span>
              </span>
           </div>
        </div>
     </div>
     </div>
     
     