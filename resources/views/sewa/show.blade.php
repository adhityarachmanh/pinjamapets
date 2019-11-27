

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
                           <h1 class="button control truncate is-primary is-large is-expanded is-fullwidth is-cursor-auto has-text-left">{{$s->struk==""||$s->struk==null?'Upload Struk':'Sewa Barang'}}</h1>
                              <p class="control">
                                 <a href="{{route('slug.converter',['status'=>'pencarian','slug'=>$b->merk])}}" class="button is-dark is-large is-uppercase" title="{{$b->nama}}">
                                 Sewa
                                 </a>
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="column columnsidemenu is-4-widescreen is-5-desktop">
                     <div class="normalcorner">
                        <div class="field has-addons">
                           <p class="control is-expanded">
                              
                              <a  rel="nofollow" class="button is-large has-text-left 
                              {{$s->status=="verified"?'is-success':''}}
                              {{$s->struk!=null && $s->status=="unverified"?'is-warning':''}}
                              {{$s->status=="unverified" && $s->struk==null?'is-danger':''}}">
                              <span style="margin-right: auto;">Data Sewa</span></span> 
                              <span class="subscribecount local"> <span class="subscribecount local"> <i class="fa fa-shopping-bag"></i></span></span>
                              </a>

                           </p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="columns columncontent is-desktop">
                  <div class="column columnsidemenu columngallery is-4-widescreen is-5-desktop">
                     <div class="columninner inverttooltips background is-dark">
                        <div class="normalbox mediabox">
                           <figure class="image"><a href="{{asset("images/items/$b->kategori/$b->merk/$b->id/$b->gambar")}}" class="thickbox thickboxmulti">
                              <img src="{{asset("images/items/$b->kategori/$b->merk/$b->id/$b->gambar")}}" alt="{{$b->gambar}}"></a>
                           </figure>
                        </div>
                        <div class="media row">
                              <div class="media-left">Status Sewa</div>
                              <div class="media-content has-text-right">
                                    {{$s->status=="verified"?'Sudah Di Verifikasi':''}}
                                    {{$s->struk!=null && $s->status=="unverified"?'Menunggu Konfirmasi':''}}
                                    {{$s->status=="unverified" && $s->struk==null?'Upload Struk':''}}				
                              </div>
                           </div>
                        <div class="normalbox menubox">
                           <div class="normalcorner">
                              <div class="field">
                                 <h2 class="button control truncate is-primary is-medium is-expanded is-fullwidth is-cursor-auto has-text-left">Data Sewa</h2>
                              </div>
                           </div>
                           <div class="body">
                              <div class="tablemenu">
                                 <div class="media row">
                                    <div class="media-left">Nama</div>
                                    <div class="media-content has-text-right">
                                       {{$b->nama}}				
                                    </div>
                                 </div>
                                 <div class="media row">
                                        <div class="media-left">Merk</div>
                                        <div class="media-content has-text-right">
                                           {{$b->merk}}				
                                        </div>
                                     </div>
                                 <div class="media row">
                                    <div class="media-left">Kategori</div>
                                    <div class="media-content has-text-right">
                                       {{$b->kategori}}			
                                    </div>
                                 </div>
                                
                                 <div class="media row">
                                    <div class="media-left">Jangka Waktu</div>
                                    <div class="media-content has-text-right">
                                      {{$s->jangka_waktu}} Bulan {{$s->jangka_waktu=="24"?' / 2 Tahun':''}}	{{$s->jangka_waktu=="12"?' / 1 Tahun':''}}		
                                    </div>
                                 </div>
                                 <div class="media row">
                                    <div class="media-left">Biaya</div>
                                    <div class="media-content has-text-right">
                                       {{'Rp '.number_format($s->harga,2,',','.')}}				
                                    </div>
                                 </div>
                              
                              </div>
                           </div>
                        </div>
                     </div>
                     @if($s->struk==""||$s->struk==null)
                     <div class="paginationurls has-text-centered is-hidden-touch"  >
                        <p>
                           <a class="button is-dark is-medium is-rounded is-padded" onclick="uploadStruk();return;">
                           <span class="icon">
                           <i class="fa fa-upload"></i>
                           </span>
                           <span>Upload Struk</span>
                           </a>
                        </p>
                     </div>
                     @endif
                  </div>
                  <div class="column columnmain is-8-widescreen is-7-desktop">
                     <div class="normalbox formbox" id="membersform">
                         @if($s->struk==null && $s->status=="unverified")
                        @include('layouts.manage._includes.upload_struk._uploadstruk')
                        @elseif($s->struk!=null && $s->status=="verified")
                        {!!$b->deskripsi!!}
                        <h5 class="title is-capitalized m-t-30">status pengiriman : </h5>
                        <div class="field row rowmodssteps m-t-30">
                              <div class="field">
                                 <div class="columns is-mobile is-gapless">
                                    @if(
                                       $s->status_pengiriman==1||
                                       $s->status_pengiriman==2||
                                       $s->status_pengiriman==3||
                                       $s->status_pengiriman==4||
                                       $s->status_pengiriman==5
                                       )
                                    <div class="column has-text-centered">
                                       <div class="field is-grouped is-divider is-marginless is-paddingless">
                                          <div class="control is-expanded is-marginless"></div>
                                          <a href="" class="control controlicon">
                                             <span class="button is-rounded has-text-weight-bold is-success" title="This step is required">
                                              1
                                             </span>
                                          </a>
                                          <div class="control is-expanded is-marginless">
                                             <hr class="background is-success is-hidden-mobile">
                                          </div>
                                       </div>
                                       <span class="has-text-weight-bold">Sedang Di Proses</span>
                                    </div>
                                    @else
                                    <div class="column has-text-centered">
                                       <div class="field is-grouped is-divider is-marginless is-paddingless">
                                          <div class="control is-expanded is-marginless"></div>
                                          <a href="" class="control controlicon">
                                             <span class="button is-rounded has-text-weight-bold is-light" title="This step is required">
                                             1
                                             </span>
                                          </a>
                                          <div class="control is-expanded is-marginless">
                                             <hr class="background is-light is-hidden-mobile">
                                          </div>
                                       </div>
                                       <span class="has-text-weight-bold">Sedang Di Proses</span>
                                    </div>
                                    @endif
                                    @if(
                                      
                                       $s->status_pengiriman==2||
                                       $s->status_pengiriman==3||
                                       $s->status_pengiriman==4||
                                       $s->status_pengiriman==5
                                       )
                                    <div class="column has-text-centered">
                                       <div class="field is-grouped is-divider is-marginless is-paddingless">
                                          <div class="control is-expanded is-marginless">
                                             <hr class="background is-success is-hidden-mobile">
                                          </div>
                                          <p class="control controlicon">
                                             <span class="button is-rounded has-text-weight-bold is-success csstooltip" original-title=""><span class="icon">2</span></span></p>
                                          <div class="control is-expanded is-marginless">
                                             <hr class="background is-success is-hidden-mobile">
                                          </div>
                                       </div>
                                       <span class="has-text-weight-bold">Packing Barang</span>
                                    </div>
                                    @else
                                    <div class="column has-text-centered">
                                       <div class="field is-grouped is-divider is-marginless is-paddingless">
                                          <div class="control is-expanded is-marginless">
                                             <hr class="background is-light is-hidden-mobile">
                                          </div>
                                          <p class="control controlicon"><span class="button is-rounded has-text-weight-bold is-light csstooltip" original-title=""><span class="icon">2</span></span></p>
                                          <div class="control is-expanded is-marginless">
                                             <hr class="background is-light is-hidden-mobile">
                                          </div>
                                       </div>
                                       <span class="has-text-weight-bold">Packing Barang</span>
                                    </div>
                                    @endif
                                    @if(
                                      
                                   
                                       $s->status_pengiriman==3||
                                       $s->status_pengiriman==4||
                                       $s->status_pengiriman==5
                                       )
                                    <div class="column has-text-centered">
                                       <div class="field is-grouped is-divider is-marginless is-paddingless">
                                          <div class="control is-expanded is-marginless">
                                             <hr class="background is-success is-hidden-mobile">
                                          </div>
                                          <p class="control controlicon"><span class="button is-rounded has-text-weight-bold is-success csstooltip" title=""><span class="icon">3</span></span></p>
                                          <div class="control is-expanded is-marginless">
                                             <hr class="background is-success is-hidden-mobile">
                                          </div>
                                       </div>
                                       <span class="has-text-weight-bold">Kurir Ready</span>
                                    </div>
                                    @else
                                    <div class="column has-text-centered">
                                          <div class="field is-grouped is-divider is-marginless is-paddingless">
                                             <div class="control is-expanded is-marginless">
                                                <hr class="background is-light is-hidden-mobile">
                                             </div>
                                             <p class="control controlicon"><span class="button is-rounded has-text-weight-bold is-light csstooltip" title=""><span class="icon">3</span></span></p>
                                             <div class="control is-expanded is-marginless">
                                                <hr class="background is-light is-hidden-mobile">
                                             </div>
                                          </div>
                                          <span class="has-text-weight-bold">Kurir Ready</span>
                                       </div>
                                    @endif
                                    @if(
                                      
                                
                                       $s->status_pengiriman==4||
                                       $s->status_pengiriman==5
                                       )
                                    <div class="column has-text-centered">
                                       <div class="field is-grouped is-divider is-marginless is-paddingless">
                                          <div class="control is-expanded is-marginless">
                                             <hr class="background is-success is-hidden-mobile">
                                          </div>
                                          <p class="control controlicon"><span class="button is-rounded has-text-weight-bold is-success csstooltip" title=""><span class="icon">4</span></span></p>
                                          <div class="control is-expanded is-marginless">
                                             <hr class="background is-success is-hidden-mobile">
                                          </div>
                                       </div>
                                       <span class="has-text-weight-bold">Barang Sedang Di Kirim</span>
                                    </div>
                                    @else
                                    
                                    <div class="column has-text-centered">
                                          <div class="field is-grouped is-divider is-marginless is-paddingless">
                                             <div class="control is-expanded is-marginless">
                                                <hr class="background is-light is-hidden-mobile">
                                             </div>
                                             <p class="control controlicon"><span class="button is-rounded has-text-weight-bold is-light csstooltip" title=""><span class="icon">4</span></span></p>
                                             <div class="control is-expanded is-marginless">
                                                <hr class="background is-light is-hidden-mobile">
                                             </div>
                                          </div>
                                          <span class="has-text-weight-bold">Barang Sedang Di Kirim</span>
                                       </div>
                                    @endif
                                    @if(
                                      
                                
                                      
                                       $s->status_pengiriman==5
                                       )
                                    <div class="column has-text-centered">
                                       <div class="field is-grouped is-divider is-marginless is-paddingless">
                                          <div class="control is-expanded is-marginless">
                                             <hr class="background is-success is-hidden-mobile">
                                          </div>
                                          <p class="control controlicon"><span class="button is-rounded has-text-weight-bold is-success csstooltip" title=""><span class="icon">5</span></span></p>
                                          <div class="control is-expanded is-marginless"></div>
                                       </div>
                                       <span class="has-text-weight-bold">Barang Sampai Tujuan</span>
                                    </div>
                                    @else
                                    <div class="column has-text-centered">
                                          <div class="field is-grouped is-divider is-marginless is-paddingless">
                                             <div class="control is-expanded is-marginless">
                                                <hr class="background is-light is-hidden-mobile">
                                             </div>
                                             <p class="control controlicon"><span class="button is-rounded has-text-weight-bold is-light csstooltip" title=""><span class="icon">5</span></span></p>
                                             <div class="control is-expanded is-marginless"></div>
                                          </div>
                                          <span class="has-text-weight-bold">Barang Sampai Tujuan</span>
                                       </div>
                                    @endif
                                 </div>
                              </div>
                           </div>
                           @else
                           {!!$b->deskripsi!!}
                        @endif
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</section>
@endsection
@section('scripts')
<script type="text/javascript">
   function openFileOption()
 {
document.getElementById("file1").click();
}
 function uploadStruk(){
   Swal.fire({
  title: 'Anda Yakin?',
  text: "Sewa Anda Akan Kami Proses Stelah Menguplaod Struk",
  type: 'question',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ya, Upload Struk!'
}).then((result) => {
  if (result.value) {
   $('#upload_struk').submit();
  }
})
 
 }       
function readURL(input) {
       if (input.files && input.files[0]) {
           var reader = new FileReader();
   
           reader.onload = function (e) {
               $('#blash')
                   .attr('style',"background-image: url('"+e.target.result+"');" )
                   .width('100%')
                   .height('300px');
           };
   
           reader.readAsDataURL(input.files[0]);
       }
   }
</script>
@endsection

