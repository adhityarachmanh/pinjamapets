<?php 
use App\Kategori;
use App\Barang;
use App\Sewa;
?>
<div id="appmenu" class="background is-dark">
    <nav class="navbar">
        <div class="navbar-brand">
            <a  class="navbar-item navbar-logo">
            <img src="{{asset('images/logo.png')}}" alt="Meeple Station">
            </a>
        </div>
    </nav>
    <div class="navscroll is-scrollable">
        <div class="navscroll-content">
            <div class="field fieldsearch wadah">
                    <form action="" action="#" method="post" id="barang-form">
                            <div class="field">
                               <p class="control has-icons-right is-dark">
                                  <input type="text" name="nameid" maxlength="20" value=""   class="input" placeholder="Cari Kode Sewa" required="required">
                                  <span class="icon is-small is-right " >
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
                <div class="search-suggest" style="position:relative"></div>
            </div>
            <div class="field">
                <aside class="menu inverttooltips">
                    <ul class="menu-list">
                        <li >
                        <a href="{{route('admin.dashboard')}}" class="{{Request::path()=="admin"? 'is-active':''}}">
                             
                                Dashboard
                            </a>
                        </li>
                    </ul>
                    <p class="menu-label">Sewa</p>
                    <ul class="menu-list">
                          
                         <li>
                        <a href="{{route('manage-sewa.status',['status'=>'verified'])}}" class="{{Request::path()=="admin/manage-sewa/status/verified"? 'is-active':''}}">
                                <?php 
                                
                                $v_sewa=Sewa::where('status','verified')->count();
                                ?>
                            <span class="count tag is-pulled-right is-dark">{{$v_sewa}}</span>
                            List Sewa ( Verified )</a>
                        </li>
                        <li>
                            <a href="{{route('manage-sewa.status',['status'=>'struk'])}}" class="{{Request::path()=="admin/manage-sewa/status/struk"? 'is-active':''}}">
                                    <?php 
                                
                                    $strk_sewa=Sewa::where('status','unverified')
                                    ->whereNotNull('struk')
                                    ->count();
                                    ?>
                                <span class="count tag is-pulled-right is-dark">{{$strk_sewa}}</span>
                                Konfirmasi Struk</a>
                        </li>
                    </ul>
                    <p class="menu-label truncate">Pesan</p>
                    <ul class="menu-list">
                        <li>
                        <a class="{{Request::path()=="admin/manage-pesan/create"?'is-active':''}}" href="{{route('manage-pesan.create')}}">
                                
                                Tulis Pesan
                            </a>
                        </li>
                        <li>
                            <a class="{{Request::path()=="admin/manage-pesan"?'is-active':''}}" href="{{route('manage-pesan.index')}}">
                                <span id="pesan-unread-wadah1" class="count tag is-pulled-right is-dark" style="display:none;"></span>
                                Kotak Masuk</a>
                        </li>
                    </ul>
                    <p class="menu-label truncate">Kategori Sewa</p>
                  
                    <ul class="menu-list">
                            <li>
                            <a href="{{route('manage-kategori.index')}}" class="{{Request::path()=="admin/manage-kategori"? 'is-active':''}}">List Kategori</a>
                                </li>
                       
                    </ul>
                    <p class="menu-label truncate">Barang Sewa</p>
                  
                    <ul class="menu-list">
                            <?php 
                            $habis=Barang::where('quantity',0)->count();
                            ?>
                            @if($habis!=0)
                        <li>
                        <a class="{{Request::path()=="admin/manage-barang/stock-habis/list"?'is-active':''}}" href="{{route('manage-barang.stock-habis')}}" >
                                <span class="tag is-warning"><i class="fa fa-warning"></i></span>
                                <span class="m-l-10"> Barang Habis</span>
                                <span class="count is-pulled-right">
                                   
                                    <span class="tag is-danger">{{$habis}}</span>
                                </span>
                     
                        
                           
                        </a>
                        </li>
                        @endif
                            <li>
                                    <a onclick="return drop_klik();" id="tmbl_dropdown">List Barang</a>
                            <ul  id="dropdown" class="{{Request::path()=="admin/manage-barang/$status"?'':'is-hidden'}}">
                                        <?php 
                                         
                                            $kat=Kategori::all();    
                                        ?>
                                        @foreach($kat as $k)
                                            <?php $jmlh=Barang::where('kategori',$k->slug)->count(); ?>
                            <li><a href="{{route('manage-barang.show',$k->slug)}}" class="is-capitalized {{Request::path()=="admin/manage-barang/$k->slug"?'is-active':''}}"><span class="count tag is-pulled-right is-dark">{{$jmlh}}</span>{{$k->nama}}</a></li>
                                        @endforeach
                                    </ul>
                            </li>
                   
                    </ul>
                </aside>
            </div>
            <footer class="footer is-size-7 is-hidden-mobile has-text-centered">
                <a href="https://mod.io">&copy;2019 PINJAM.APET</a>
               
            </footer>
        </div>
    </div>
</div>

<script>
       function drop_klik(){
            
            if( $('#dropdown').hasClass('is-hidden')){
                $('#dropdown').removeClass('is-hidden');
     
            }else{
                $('#dropdown').addClass('is-hidden');
              
            }
       }
    </script>
