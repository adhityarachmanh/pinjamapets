@extends('layouts.manage')
@section('content')



<section class="section">
    <div class="container is-fluid">
       <div class="columns columnsholder is-block">
          <div class="column columnfull">
           
             <div class="columns columnsheader is-desktop">
                <div class="column is-8-widescreen is-7-desktop">
                   <div class="normalbox">
                      <div class="normalcorner">
                         <div class="field has-addons">
                         <h1 class="button control truncate is-primary is-large is-expanded is-fullwidth is-cursor-auto has-text-left">{{$b->nama}}</h1>
                           
                            <p class="control">
                            <a href="{{route('slug.converter',['status'=>'pencarian','slug'=>$b->merk])}}" class="button is-dark is-large is-uppercase" title="{{$b->nama}}">
                                  
                                    {{$b->merk}}
                            
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
                            <a  rel="nofollow" class="button is-large has-text-left {{$b->quantity==0?'is-danger':'is-success'}}">
                               <span style="margin-right: auto;">Barang <span class="is-hidden-tiny">{{$b->quantity==0?'Tidak Tersedia':'Tersedia'}}</span></span> 
                              
                               <span class="subscribecount local">{{$b->quantity==0?'':$b->quantity}} <span class="subscribecount local"> {{$b->quantity==0?'':'item'}}</span></span>
                               
                            </a>
                         </p>
                      </div>
                   </div>
                </div>
             </div>
            
             <div class="columns columncontent is-desktop">
                <div class="column columnsidemenu columngallery is-4-widescreen is-5-desktop">
                   <div class="columninner inverttooltips background is-dark">
                      <div class="normalbox menubox" id="ratingmod">
                         <div class="body">
                           
                            <div class="tablemenu">
                               <div class="media row rowrating is-cursor-pointer">
                                  <div class="media-content has-text-left">
                                     <div class="levelinfo is-clearfix">
                                        <span>Dilihat</span>
                                        <div class="field is-grouped is-marginless is-pulled-right">
                                           <p class="control">
                                              <a  class="button csstooltip is-dark is-paddingless karmagoodicon " rel="nofollow" title="Dilihat">
                                                 <span class="icon ">
                                                    <svg class="fa icon-light-eye">
                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-light-eye"></use>
                                                     </svg>
                                                 </span>
                                                <span class="karmagoodcount local">{{$b->dilihat}}</span>
                                              </a>
                                           </p>
                                           
                                        </div>
                                     </div>
                                    <progress class="progress progressrating csstooltip {{$b->dilihat!=0?$status_dilihat:''}}" value="{{$b->dilihat}}" max="100" title="{{$b->dilihat}}% pengunjung melihat barang ini"></progress>				
                                  </div>
                                  
                               </div>
                              
                            </div>
                            <div class="tablemenu">
                                <div class="media row rowrating is-cursor-pointer">
                                   <div class="media-content has-text-left">
                                      <div class="levelinfo is-clearfix">
                                         <span>Tersewa</span>
                                         <div class="field is-grouped is-marginless is-pulled-right">
                                            <p class="control">
                                               <a  class="button csstooltip is-dark is-paddingless karmagoodicon " rel="nofollow" title="Tersewa">
                                                  <span class="icon ">
                                                    <i class="fa fa-cog"></i>
                                                  </span>
                                                  <span class="karmagoodcount local">{{$b->tersewa}}</span>
                                               </a>
                                            </p>
                                            
                                         </div>
                                      </div>
                                    <progress class="progress progressrating csstooltip {{$b->tersewa!=0?$status_tersewa:''}}" value="{{$b->tersewa}}" max="100" title="{{$b->tersewa}}% pengunjung menyewa barang ini"></progress>				
                                   </div>
                                   
                                </div>
                               
                             </div>
                         </div>
                      </div>
                      <div class="normalbox mediabox">
                      <figure class="image"><a href="{{asset("images/items/$b->kategori/$b->merk/$b->id/$b->gambar")}}" class="thickbox thickboxmulti"><img src="{{asset("images/items/$b->kategori/$b->merk/$b->id/$b->gambar")}}" alt="{{$b->gambar}}"></a></figure>
                      </div>
                  
                  
                   </div>
                   
                   <div class="paginationurls has-text-centered is-hidden-touch" style="{{$b->quantity==0?'display:none':''}}" >
                      <p>
                      <a class="button is-dark is-medium is-rounded is-padded" href="{{route('sewa.create',['id'=>$b->id,'sewa'=>'sewa-1-bulan'])}}">
                            <span class="icon">
                               <i class="fa fa-cog"></i>
                            </span>
                            <span>Sewa Barang</span>
                         </a>
                      </p>
                   </div>
                </div>
                <div class="column columnmain is-8-widescreen is-7-desktop">
                   <div class="normalbox has-text-justified">
                   <div class="body">
                      {!!$b->deskripsi!!}
                   </div>
                   </div>
                   <div class="normalbox browsebox">
                      <div class="normalcorner">
                         <div class="field">
                            <h2 class="button control truncate is-primary is-medium is-expanded is-fullwidth is-cursor-auto has-text-left">
                              Detail Sewa Barang</h2>
                         </div>
                      </div>
                      <div class="body">
                         <table class="table is-narrow is-marginless">
                            <thead>
                               <tr class="rowtitle">
                                 
                                  <th>Durasi</th>
                                  <th class="is-hidden-touch has-text-centered">Harga</th>
                                  <th class="has-text-centered">Potongan</th>
                                  <th class="has-text-right"></th>
                               </tr>
                            </thead>
                            <tbody>
                               <tr class="row rowcontent ">
                               <td>1 Hari</td>
                                  <td class="has-text-centered">Rp {{number_format($b->harga,2,',','.')}}</td>
                                  <td class="has-text-centered">Tidak Ada Potongan</td>
                                  <td class="has-text-right"><a class="button is-light is-rounded is-padded {{$b->quantity==0?'is-hidden':''}}" href="{{route('sewa.create',['id'=>$b->id,'sewa'=>'sewa-1-hari'])}}">
                                  <span class="icon">
                                     <i class="fa fa-cog"></i>
                                  </span>
                                  <span>Sewa 1 Hari</span>
                               </a></td>
                               </tr>
                               <tr class="row rowcontent ">
                                  <td>3 Hari</td>
                                     <td class="has-text-centered">Rp {{number_format($harga3hari,2,',','.')}}</td>
                                    <td class="has-text-centered">5%</td>
                               <td class="has-text-right"><a class="button is-light is-rounded is-padded {{$b->quantity==0?'is-hidden':''}}" href="{{route('sewa.create',['id'=>$b->id,'sewa'=>'sewa-3-hari'])}}">
                                     <span class="icon">
                                        <i class="fa fa-cog"></i>
                                     </span>
                                     <span>Sewa 3 Hari</span>
                                  </a></td>
                                  </tr>
                                  <tr class="row rowcontent ">
                                      <td>5 Hari</td>
                                         <td class="has-text-centered">Rp {{number_format($harga5hari,2,',','.')}}</td>
                                        <td class="has-text-centered">10%</td>
                                         <td class="has-text-right"><a class="button is-light is-rounded is-padded {{$b->quantity==0?'is-hidden':''}}" href="{{route('sewa.create',['id'=>$b->id,'sewa'=>'sewa-5-hari'])}}">
                                         <span class="icon">
                                            <i class="fa fa-cog"></i>
                                         </span>
                                         <span>Sewa 5 Hari</span>
                                      </a></td>
                                      </tr>
                                      <tr class="row rowcontent ">
                                          <td>7 Hari</td>
                                             <td class="has-text-centered">Rp {{number_format($harga7hari,2,',','.')}}</td>
                                            <td class="has-text-centered">35%</td>
                                             <td class="has-text-right"><a class="button is-light is-rounded is-padded {{$b->quantity==0?'is-hidden':''}}" href="{{route('sewa.create',['id'=>$b->id,'sewa'=>'sewa-7-hari'])}}">
                                             <span class="icon">
                                                <i class="fa fa-cog"></i>
                                             </span>
                                             <span>Sewa 7 Hari</span>
                                          </a></td>
                                          </tr>
                            </tbody>
                         </table>
                        
                      </div>
                   </div>
                
                   
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 

@endsection
