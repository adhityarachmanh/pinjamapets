<div class="body">
<form action="{{route('sewa.update',$s->id)}}" method="post" id="upload_struk" enctype="multipart/form-data">
   {{csrf_field()}}
   {{method_field('PUT')}}
           <input  type="file" id="file1" name="gambar" style="display:none" onchange="readURL(this);" required>
           <div class="field row rowmembersintro">
              <div class="field">
                  <label class="label" for="membersavatar">Note:</label>
                   <a >{{$s->kodesewa}}</a></p>
              </div>
           </div>
           <div class="field row rowmembersavatar">
              <label class="label" for="membersavatar">Transfer Bank:</label>
           @if($s->bank=="bca")
           <p><img width="100" src="{{asset('images/bca-logo.png')}}"> </p>
           <p><i class="fa fa-id-card"></i> Muhammad Faiz Ananda </p>
            <p class="m-t-10"><i class="fa fa-credit-card"></i> 0070206501</p>
           @elseif($s->bank=="mandiri")
           <p><img width="100" src="{{asset('images/mandiri-logo.png')}}"> </p>
           <p><i class="fa fa-id-card"></i> Muhammad Faiz Ananda</p>
           <p><i class="fa fa-credit-card"></i> 1200010166952</p>
       
           @endif
           </div>
           <div class="field row rowmembersavatar">
              <label class="label" for="membersavatar">Kode Sewa:</label>
              <ul class="help">
                 <li>Foto Struk Jelas</li>
                 <li>Setelah Di Upload Akan Segera Kami Proses</li>
                 <li>Bila Ada Kendala Akan Kami Beritahu Melalu Fitur Pesan</li>
              </ul>
              <div class="field">
                 <div  class="preview previewimage" style="width:300px">
                    <label for="membersavatar" class="image background is-dark" id="blash" style=" padding-top: 100%;">
                       <span class="field fieldpreview has-addons is-centered-text">
                          <span class="control add">
                             <span class="button csstooltip is-dark" title="Edit" onclick="openFileOption();return;">
                                <span class="icon">
                                   <span class="icon is">
                                      <div class="fa fa-upload"></div>
                                   </span>
                                </span>
                             </span>
                          </span>
                       </span>
                    </label>
                 </div>
              </div>
           </div>
        </form>
     </div>