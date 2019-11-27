@extends('layouts.manage')
@section('content')
    

           <section class="section">
               <div class="container is-fluid">
                   <div class="columns columnsholder is-block">
                       <div class="column columnfull">
                          
                           <div class="normalbox browsebox">
                               <div class="normalcorner tempat">
                                   <div class="field has-addons" id="gas">
                                   <h1 class="button control truncate is-primary is-large is-expanded is-fullwidth is-cursor-auto has-text-left is-capitalized pesan">{{$info}} {{$info=="pencarian"? '"'."$pencarian".'"':''}}</h1>
                 
                                   </div>
                               </div>
                              
                              
                               <div class="body m-t-30">
                                   <div class="tablegrid tablebrowse columns is-multiline is-mobile" >
                                      <!--fetch data barang-->
                                     @foreach($datas as $b)
                                       <div class="column row rowcontent is-dynamic rowtimeframe4" id="kontent">
                                             <div class="card is-fullwidth">
                                                 <div class="card-image">
                                                     <div class="card-actions field inverttooltips has-addons">
                                                         <p class="control">
                                                             <a href="{{route('slug.converter',['status'=>'pencarian','slug'=>$b->merk])}}" rel="nofollow" class="button is-small is-danger" title="">
                                                             <span class="subscribecount local">{{$b->merk}}</span>
                                                                 
                                                             </a>
                                                         </p>
                                                     </div>
                                                    <a href="{{route('barang.show',$b->slug)}}" class="image is-16by9">
                                                     <img src="{{asset("images/items/$b->kategori/$b->merk/$b->id/$b->gambar")}}" alt="HAXE Wrapper">
                                                         <span class="card-overlay is-overlay is-scrollable is-hidden-touch has-text-justified">
                                                         <p class="m-t-30">{!!$b->deskripsi!!}</p>
                                                             <br>
                                                         <div class="tags"><span class="tag is-opaque50">{{$b->merk}}</span></div>                                                             
                                                         </span>
                                                     </a>
                                                 </div>
                                                 <header class="card-header">
                                                     <a href="{{route('barang.show',$b->slug)}}" class="card-header-title">
                                                     <span class="truncate">{{$b->nama}}</span>
                                                     </a>
                                                    
                                                 </header>
                                                
                                             </div>
                                         </div>
                                      @endforeach
                                     
                                      <div class="pace pace-inactive">
                                          <div class="pace-progress"  data-progress-text="Cari.." style="-webkit-transform: translate3d(100%, 0px, 0px); -ms-transform: translate3d(100%, 0px, 0px); transform: translate3d(100%, 0px, 0px);">
                                            <div class="pace-progress-inner">
                                                </div>
                                            </div>
                                          <div class="pace-activity"></div>
                                        </div>
                                    </div>
                                   
                                   <div class="content nomatches" style="display: none;">
                                       <p>
                                           Tidak Ada Barang 
                                       </p>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </section>

     <!-- akhir konten-->

    
@endsection
