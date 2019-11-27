@extends('layouts.manage')
@section('content')
    

<section class="wrapper">
        <section class="section">
           <div class="container is-fluid">
              <div class="columns columnsholder is-block">
                 <div class="column columnfull">
                    <div class="columns columnsheader is-desktop">
                       <div class="column is-8-widescreen is-7-desktop">
                          <div class="normalbox">
                             <div class="normalcorner">
                                <div class="field has-addons">
                                   <h1 class="button control truncate is-primary is-large csstooltip is-expanded is-fullwidth is-cursor-auto has-text-left" original-title="Online 1 hour">
                                      <span class="icon">
                                         <svg class="fa icon-light-bolt">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-light-bolt"></use>
                                         </svg>
                                      </span>
                                    <span>{{$user->name}}</span>
                                   </h1>
                                   <p class="control">
                                   <a href="{{route('user.edit',$user->id)}}" class="button csstooltip is-dark is-large editicon" title="Edit profile">
                                         <span class="icon ">
                                          <i class="fa fa-pencil"></i>
                                         </span>
                                      </a>
                                   </p>
                                   @if(Auth::User()->status_login==null)
                                   <p class="control">
                                      <a href="" class="button csstooltip is-dark is-large passwordicon" title="Password">
                                         <span class="icon ">
                                                <span class="icon ">
                                                        <i class="fa fa-lock"></i>
                                                       </span>
                                         </span>
                                      </a>
                                   </p>
                                 @endif
                                </div>
                             </div>
                          </div>
                       </div>

                       <div class="column columnsidemenu is-4-widescreen is-5-desktop">
                          <div class="normalcorner">
                             <div class="field has-addons">
                                <p class="control is-expanded">
                                   <a  rel="nofollow" class="button is-large has-text-left is-light">
                                      <span style="margin-right: auto;">Profil</span> 
                                      <span class="icon ">
                                       @include('layouts.manage._includes.status._status')
                                      </span>
                                    
                                   </a>
                                </p>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="columns columncontent is-desktop">
                       <div class="column columnsidemenu is-4-widescreen is-5-desktop">
                          <div class="columninner inverttooltips background is-dark">
                             <div class="normalbox menubox">
                                <div class="body">
                                   <div class="tablemenu">
                                 
                                  

                                      <div class="media row">
                                         <div class="media-left">Foto</div>
                                         <div class="media-content has-text-right">
                                            <img src="{{Auth::User()->status_login!=null?Auth::User()->foto : asset('images/user/'.Auth::User()->id.'/foto/'.Auth::User()->foto)}}" onerror='this.src="{{asset("images/user.png")}}"' alt="{{Auth::User()->name}}" width="50" height="50">				
                                         </div>
                                      </div>
                                     
                                   </div>
                                </div>
                             </div>
                             <div class="normalbox menubox">
                                <div class="normalcorner">
                                   <div class="field">
                                      <h2 class="button control truncate is-primary is-medium is-expanded is-fullwidth is-cursor-auto has-text-left">Data</h2>
                                   </div>
                                </div>
                                <div class="body">
                                   <div class="tablemenu">
                                      <div class="media row">
                                         <div class="media-left">ID</div>
                                         <div class="media-content has-text-right">
                                            {{$user->id}}				
                                         </div>
                                      </div>
                                      <div class="media row">
                                          <div class="media-left">Alamat</div>
                                          <div class="media-content has-text-right">
                                              {{$user->alamat}}
                                                    
                                          </div>
                                       </div>
                                       <div class="media row">
                                             <div class="media-left">No Telpon</div>
                                             <div class="media-content has-text-right">
                                                 {{$user->phone!=null?"08".$user->phone:''}}
                                                       
                                             </div>
                                          </div>
                                      <div class="media row">
                                         <div class="media-left">Barang Yang Dilihat</div>
                                         <div class="media-content has-text-right">
                                             {{count($b)}}
                                             		
                                         </div>
                                      </div>
                                      
                                      <div class="media row">
                                          <div class="media-left">Barang Yang Di Sewa</div>
                                          <div class="media-content has-text-right">
                                            {{count($s)}}
                                          </div>
                                       </div>
                                      <div class="media row">
                                         <div class="media-left">Waktu Online</div>
                                         <div class="media-content has-text-right">
                                           <h3 id="waktuonline"></h3>		
                                         </div>
                                      </div>
                                     
                                      <div class="media row">
                                         <?php $visit=explode(',',$user->visit_perhari); ?>
                                         <div class="media-left">Visit Web (PINJAM.APET)</div>
                                         <div class="media-content has-text-right">
                                            <a >{{$visit[0]}} (Hari)</a>				
                                         </div>
                                      </div>
                                   </div>
                                </div>
                             </div>
                             <div class="normalbox menubox">
                                <div class="normalcorner">
                                   <div class="field">
                                      <h2 class="button control truncate is-primary is-medium is-expanded is-fullwidth is-cursor-auto has-text-left"></h2>
                                   </div>
                                </div>
                              
                             </div>
                          </div>
                       
                       </div>
                       <div class="column is-8-widescreen is-7-desktop">
                          <div class="normalbox infobox">
                             <div class="body">
                                <div class="content">
                                   <p>Selamat Datang di Profil Anda , Untuk Lebih Mudahnya Transaksi Pada PINJAM.APET Anda Di Haruskan Melengkapi Data Pribadi Anda.</p>
                                   <ul>
                                      <li>Seperti Di Bawah Ini:</li>
                                      <ol>
                                         <li>Tambahkan Alamat Anda Agar Lebih Mudahnya Transaksi Pada PINJAM.APET</a>.</li>
                                         <li>Tambahkan Nomor Telpon Anda Agar Lebih Mudah Konfirmasi Jika Terjadi Kendala.</li>
                                         <li>Jika Anda Menggunakan Akun Media Online Seperti Facebook ,Gmail atau Instagram Anda Tidak Diperkenankan Mengganti Password.</li>
                                        
                                      </ol>
                                     
                                   </ul>
                                   <p>Jika Anda Ada Pertanyaan Seputar Pesanan Anda Dapat Menggunakan Fitur Kirim Pesan Yang di Sediakan PINJAM.APET.</p>
                                   <p>
                                   <a href="{{route('slug.converter',['status'=>'items','slug'=>'all'])}}" class="icon is-large is-pulled-right">
                                         <svg class="fa icon-custom-modio" aria-label="">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-custom-modio"></use>
                                         </svg>
                                      </a>
                                      Semoga Anda Nyaman,<br><a href=""> Team PINJAM.APET</a>
                                   </p>
                                </div>
                             </div>
                          </div>
                          
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </section>
     </section>
     
     <script>
      setInterval(function(){
        var gas=new XMLHttpRequest();
        gas.open('GET',"/usercountdown/user",false);
           gas.send(null);
           document.getElementById('waktuonline').innerHTML="<span><i class='fa fa-clock'></i> "+gas.responseText+"</span>";
         
        
      },1000)

 </script>

@endsection