

<div id="appmenu" class="background is-dark">
        <nav class="navbar">
           <div class="navbar-brand">
              <a href="/" class="navbar-item navbar-logo">
              <img src="{{asset('images/logo.png')}}" alt="Apps">
              </a>
           </div>
        </nav>
        <div class="navscroll is-scrollable">
           <div class="navscroll-content">
              <div class="field fieldsearch wadah"  >
                 <form action="" action="#" method="post" id="barang-form">
                    <div class="field">
                       <p class="control has-icons-right is-dark">
                          <input type="text" name="nameid" maxlength="20" value="" id="input-cari"  class="input" placeholder="Search" autocomplete="off" required="required">
                          <span class="icon is-small is-right " id="tombol-cari">
                             <svg class="fa icon-light-search" >
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-light-search"></use>
                             </svg>
                          </span>
                       </p>
                    </div>
                 </form>
                 
                 <div class="field fieldmsg has-text-centered">
                    <a href="#" class="is-opaque25"></a>
                 </div>
                 <div class="search-suggest" style="position:relative">
                     <div class="dropdown-menu" style="display: block;">
                        <div class="dropdown-content" id="cari-kilat">
                           </div>
                        </div>
                     </div>
              </div>
              <div class="field">
                 <aside class="menu inverttooltips">
                    <ul class="menu-list">
                       <li class="blockmenu">
                          <?php 
                             use App\Kategori;
                             use App\Barang;
                             $kategoris=Kategori::all();
                             
                             ?>
                          <?php 
                             $semua=Barang::all()->count();
                             ?>
                          <a href="{{route('slug.converter',['status'=>'items','slug'=>'all'])}}" class="{{$info=='all'?'is-active':''}} is-embed">
                          <span class="count tag is-pulled-right is-dark">{{ $semua}}</span>
                          All
                          </a>
                       </li>
                       <li class="filtermenu ">
                          <p class="menu-label truncate m-t-10">Kategori</p>
                          <ul>
                             @foreach ($kategoris as $k)
                             <li>
                                <?php 
                                   $jmlh=Barang::where('kategori',$k->slug)->count();
                                   ?>
                                <a href="{{route('slug.converter',['status'=>'kategori','slug'=>$k->slug])}}" class="is-capitalized {{$info==$k->slug?'is-active':''}}">
                                <span class="count tag is-pulled-right is-dark">{{$jmlh}}</span>
                                {{$k->nama}}
                                </a>
                             </li>
                             @endforeach
                          </ul>
                       </li>
                       @if($info=="profile"||$info=="reset password"||$info=="edit profile")
                       @if(Auth::check())
                       <li class="filtermenu ">
                          <p class="menu-label truncate m-t-10">Akun</p>
                          <ul>
                             <li>
                                <a href="{{route('user.index')}}" class="is-capitalized {{$info=="profile"?'is-active':''}}">Profile</a>
                             </li>
                             @if(Auth::User()->status_login==null)
                             <li>
                                <a class="is-capitalized {{$info=="reset password"?'is-active':''}}">Reset Password</a>
                             </li>
                             @endif
                             <li>
                                <a href="{{route('user.edit',Auth::User()->id)}}" class="is-capitalized {{$info=="edit profile"?'is-active':''}}">Edit</a>
                             </li>
                            
                          </ul>
                       </li>
                       @endif
                       @endif
                       @if($info=="pesan inbox" || $info=="pesan compose" ||$info=="pesan sent" ||$info=="pesan subjek")
                       @if(Auth::check())
                       <li class="filtermenu ">
                          <p class="menu-label truncate m-t-10">Pesan</p>
                          <ul>
                                <li>
                                        <a class="is-capitalized {{$info=="pesan compose" ? 'is-active':''}}" href="{{route('pesan.create')}}">Tulis Pesan</a>
                                     </li>
                             <li>
                                <a class="is-capitalized {{$info=="pesan inbox" ? 'is-active':''}}" href="{{route('pesan.index')}}">Kotak Masuk</a>
                             </li>
                             {{-- <li>
                                    <a class="is-capitalized {{$info=="pesan sent" ? 'is-active':''}}" href="{{route('pesan.sent')}}">Terkirim</a>
                                 </li> --}}
                          </ul>
                       </li>
                       @endif
                       @endif
                       @if(Auth::check())
                       <li class="filtermenu ">
                            <p class="menu-label truncate m-t-10">Order</p>
                            <ul>
                       <li>
                            <a href="{{route('sewa.index')}}" class="is-capitalized {{$info=="history order"?'is-active':''}}">History Order</a>
                         </li>
                            </ul>
                       </li>
                       @endif
                    </ul>
                 </aside>
              </div>
              <footer class="footer is-size-7 is-hidden-mobile has-text-centered">
                 <a >&copy;2019 FaizAnanda</a>
              </footer>
           </div>
        </div>
     </div>
     
     @section('scripts')
         <script>
            $('#input-cari').on('keyup',function(){
               $('.search-suggest').removeClass('is-hidden');
               $('#tombol-cari').addClass('is-loading');
               var cari = $(this).val();
            $.ajax({
                url:'/api/cari-ajax/kilat',
                type:'GET',
                data:{
                    q:cari,
                },
                timeout:2000,
                dataType:'json',
                error: function(error){
                    console.log(error);
                },
                success: function(response){
                    console.log(response.kilat);
                    if(response.kilat)
                    {
                      
                        $('#cari-kilat').html(response.kilat);
                    }else{
                        $('#tombol-cari').removeClass('is-loading');
                        $('.search-suggest').addClass('is-hidden');
                    }
                  
                    
                },
            });
            });
         </script>
     @endsection
     