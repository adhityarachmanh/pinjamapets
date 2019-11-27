<div class="normalbox formbox" id="apiform">
        <p class="help"><a >Note</a>:</p>
        <ul class="help">
           <li>Anda di Haruskan Menyelesaikan Transaksi atau mengupload Struk Terlebih dahulu, Untuk Dapat Melakukan Transaksi Lain</li>
           <li>Jika Anda Ingin Membatalkan Transaksi Ini, Anda Dapat Menekan Tombol Batal Yang Ada di Table Bagian Action</li>
        </ul>
        <div class="body">
        <form action="{{route('sewa.update',$su->id)}}" method="post" id="upload_struk" enctype="multipart/form-data">
                 {{csrf_field()}}
                 {{method_field('PUT')}}
        <input id="id_sewa" type="hidden" value="{{$su->id}}">
                 <input name="gambar"  type="file" id="file1" style="display:none" onchange="readURL(this);">
              <div class="field row rowapiintro">
                 <div class="field">
                    <label class="label">Upload Struk</label>
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
                             <th colspan="3" class="has-text-centered">Action</th>
                             
                          </tr>
                       </thead>
                       <tbody>
                          <tr>
                             <td><a >{{!empty($su->kodesewa)?$su->kodesewa:''}}</a></td>
                          <td class="csstooltip" original-title="Member ID">{{$s->nama}}</td>
                          <td class="datecreated is-hidden-touch is-hidden-desktop-only">{{$s->merk}}</td>
                          <td class="is-hidden-mobile">{{$s->kategori}}</td>
                          <td class="is-hidden-mobile">{{number_format($su->harga,2,',','.')}}<br>{{'/ '.$su->jangka_waktu.' Bulan'}}</td>
                             <td class="">
                                <div class="field has-addons">
                                <a href="{{route('sewa.show',$su->id)}}" class="button is-primary is-small is-fullwidth" >
                                   <span class="icon is-small ">
                                   <i class="fa fa-eye"></i>
                                   </span>
                                   </a>
                                </div>
                             </td>
                             <td class="">
                                   <div class="field has-addons">
                                      <a  onclick="openFileOption();return;" class="button is-default is-small is-fullwidth" >
                                      <span class="icon is-small">
                                      <i class="fa fa-upload"></i>
                                      </span>
                                      </a>
                                      <a onclick="submitForm();" id="tombol_submit" class="button is-success is-small is-fullwidth m-l-10 is-hidden" >
                                            <span class="icon is-small">
                                            <i class="fa fa-check"></i>
                                            </span>
                                            </a>
                                   </div>
                                   <img id="show_gambar" class="is-hidden" src="" alt="">
                                </td>
                             <td class="">
                                <div class="field has-addons" >
                                   <a onclick="delSewa();return;" class="button is-danger is-small is-fullwidth" id="hapus-saja">
                                   <span class="icon is-small">
                                   <i class="fa fa-remove"></i>
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
     