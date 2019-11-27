<div class="normalbox formbox" id="apiform">
        <div class="body">
            
            
                 <form action="" method="post" name="apiform">
                    <div class="field row rowapiintro">
                       <div class="field">
                          <label class="label">Sukses Penyewaan</label>
                       </div>
                    </div>
                    <div class="field row rowapikeys">
                       <div class="field">
                          <table class="table is-bordered is-hoverable">
                             <thead>
                                <tr class="rowtitle is-selected">
                                   <th>Kode Sewa</th>
                                   <th class="is-hidden-touch is-hidden-desktop-only">Tanggal Pesan</th>
                                   <th>Status Pengiriman</th>
                                   <th></th>
                                </tr>
                             </thead>
                             <tbody>
                                @foreach($sv as $sewa_verified)  
                                <tr>
                                <td><a ></a>{{$sewa_verified->kodesewa}}</td>
                                <td class="csstooltip" original-title="Member ID">{{date_format($sewa_verified->created_at,'D d-m-y H:i:s')}}</td>
                                   
                                 <td>    <div class="field row rowmodssteps">
                                       <div class="field">
                                          <div class="columns is-mobile is-gapless">
                                             @if(
                                               $sewa_verified->status_pengiriman==1||
                                               $sewa_verified->status_pengiriman==2||
                                               $sewa_verified->status_pengiriman==3||
                                               $sewa_verified->status_pengiriman==4||
                                               $sewa_verified->status_pengiriman==5
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
                                               
                                               $sewa_verified->status_pengiriman==2||
                                               $sewa_verified->status_pengiriman==3||
                                               $sewa_verified->status_pengiriman==4||
                                               $sewa_verified->status_pengiriman==5
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
                                               
                                            
                                               $sewa_verified->status_pengiriman==3||
                                               $sewa_verified->status_pengiriman==4||
                                               $sewa_verified->status_pengiriman==5
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
                                               
                                         
                                               $sewa_verified->status_pengiriman==4||
                                               $sewa_verified->status_pengiriman==5
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
                                               
                                         
                                               
                                               $sewa_verified->status_pengiriman==5
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
                                    </div></td>
                                   <td class="">
                                      <div class="field has-addons">
                                         <a href="{{route('sewa.show',$sewa_verified->id)}}"  class="button is-primary is-small is-fullwidth" >
                                         <span class="icon is-small ">
                                         <i class="fa fa-eye"></i>
                                         </span>
                                         </a>
                                      </div>
                                   </td>
                                  
                                </tr>
                                @endforeach
                             </tbody>
                          </table>
                       </div>
                    </div>
                 </form>
             
        </div>
     </div>