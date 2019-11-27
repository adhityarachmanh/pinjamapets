<div class="normalbox formbox" id="apiform">
                    
        <div class="body">
        <form action="{{route('sewa.update',$sus->id)}}" method="post" id="upload_struk" enctype="multipart/form-data">
                 {{csrf_field()}}
                 {{method_field('PUT')}}
        <input id="id_sewa" type="hidden" value="{{$sus->id}}">
                 <input name="gambar"  type="file" id="file1" style="display:none" onchange="readURL(this);">
              <div class="field row rowapiintro">
                 <div class="field">
                    <label class="label">Menunggu Konfirmasi</label>
                 </div>
              </div>
              <div class="field row rowapikeys">
                 <div class="field">
                    <table class="table is-bordered is-hoverable">
                       <thead>
                          <tr class="rowtitle is-selected">
                             <th>Kode Sewa</th>
                             <th class="is-hidden-touch is-hidden-desktop-only">Kode Barang</th>
                             <th class="is-hidden-mobile">Merk</th>
                             <th class="is-hidden-touch">Kategori</th>
                             <th class="is-hidden-touch">Biaya</th>
                             <th class="has-text-centered">Action</th>
                             
                          </tr>
                       </thead>
                       <tbody>
                          <tr>
                             <td><a >{{!empty($sus->kodesewa)?$sus->kodesewa:''}}</a></td>
                          <td class="csstooltip" original-title="Member ID">{{$s->nama}}</td>
                          <td class="datecreated is-hidden-touch is-hidden-desktop-only">{{$s->merk}}</td>
                          <td class="is-hidden-mobile">{{$s->kategori}}</td>
                          <td class="is-hidden-mobile">{{number_format($sus->harga,2,',','.')}}<br>{{'/ '.$sus->jangka_waktu.' Bulan'}}</td>
                             <td class="">
                                <div class="field has-addons">
                                <a href="{{route('sewa.show',$sus->id)}}" class="button is-primary is-small is-fullwidth" >
                                   <span class="icon is-small ">
                                   <i class="fa fa-eye"></i>
                                   </span>
                                   </a>
                                </div>
                             </td>
                            
                             
                             
                          </tr>
                       </tbody>
                    </table>
                 </div>
              </div>
           </form>
        </div>
     </div>