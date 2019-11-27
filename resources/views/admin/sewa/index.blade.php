

@extends('admin.layouts.admin')
@section('content')
<section class="wrapper">
   <section class="section">
      <div class="container is-fluid">
         <div class="columns columnsholder is-block">
            <div class="column columnfull">
               <div class="normalbox formbox" id="apiform">
                  <div class="normalcorner">
                     <div class="field">
                        <h1 class="button control truncate is-primary is-large is-expanded is-fullwidth is-cursor-auto has-text-left is-capitalized">List Sewa {{!empty($status)?$status:''}}</h1>
                     </div>
                  </div>
                  <div class="body">
                     <div class="field row rowapikeys">
                        <div class="field">
                           <table class="table tablebrowse is-bordered is-hoverable">
                              <thead>
                                 <tr class="rowtitle is-selected">
                                    <th>ID</th>
                                    <th>Kode Pesanan</th>
                                    <th class="{{$status=='verified'?'is-hidden':''}}">Pembayaran</th>
                                    <th class=" ">Status</th>
                                 <th class="  {{$status!="unverified" && $status!="struk"?'':'is-hidden'}}">Status_pengiriman</th>
                                    <th class="{{$status=='verified'?'is-hidden':''}}">Struk</th>
                                    <th class="">user</th>
                                    <th class="">Opsi</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php  
                                    use App\Barang;
                                    use App\User;
                                    $no=1; ?>
                                 @foreach($sewas as $s)
                                 <form action="{{route('manage-sewa.update',$s->id)}}" id="form-{{$s->id}}" style="display:none;" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('PATCH')}}
                                    <tr>
                                       <td><a >{{$no++}}</a></td>
                                       <td class="csstooltip" original-title="Member ID">
                                       <a onclick="return lihat_pesanan{{$s->id}}();">{{$s->kodesewa}}</a>
                                          <a onclick="return lihat_pesanan{{$s->id}}();" class="is-pulled-right"><span class="icon"><i class="fa fa-eye"></i></span></a>
                                          <?php 
                                          $b=Barang::find($s->id_barang);
                                          ?>
                                          <script>
                                          function lihat_pesanan{{$s->id}}(){
                                             (async function getFormValues() {
                                       const {value: file} = await Swal.fire({
                                          title: 'Lihat Pesanan',
                                        
                                          html:'<img src="{{asset("images/items/$b->kategori/$b->merk/$b->id/$b->gambar")}}">'+
                                          '<table class="table is-fullwidth">'+
                                          '<tbody>'+
                                          '<tr class="is-capitalized">'+
                                                '<td><strong>Nama Barang</strong></td>'+
                                                '<td>:</td>'+
                                                '<td>{{$b->nama}}</td>'+
                                          '</tr>'+
                                          '<tr class="is-capitalized">'+
                                                '<td><strong>Kategori</strong></td>'+
                                                '<td>:</td>'+
                                                '<td>{{$b->kategori}}</td>'+
                                          '</tr>'+
                                          '<tr class="is-capitalized">'+
                                                '<td><strong>Merk</strong></td>'+
                                                '<td>:</td>'+
                                                '<td>{{$b->merk}}</td>'+
                                          '</tr>'+
                                          
                                          '</tbody>'+
                                          '</table>',
                                       })
                                       })()
                                          }
                                          </script>
                                       </td>
                                    <td class="is-capitalized {{$s->status!='verified'?'':'is-hidden'}}" >{{"Rp ".number_format($s->harga,2,',','.')}}{{' / '.$s->jangka_waktu.' Bulan'}} <img width="100%" style="height:50px" src="{{$s->bank=="bca"?asset('images/bca-logo.png'):asset('images/mandiri-logo.png')}}"></td>
                                       <td class="datecreated  ">{{$s->status}}</td>
                                       @if($s->status=="verified")
                                       <td class="has-text-centered">
                                          <span>
                                          <a >
                                          {{$s->status_pengiriman==0?'Tidak Ada':''}}
                                          {{$s->status_pengiriman==1?'Sedang Di Proses':''}}
                                          {{$s->status_pengiriman==2?'Sedang Di Packing':''}}
                                          {{$s->status_pengiriman==3?'Kurir Ready':''}}
                                          {{$s->status_pengiriman==4?'Barang Sedang di Kirim':''}}
                                          {{$s->status_pengiriman==5?'Barang Sampai Tujuan':''}}
                                          </a>
                                          <input type="hidden" name="status_pengiriman" id="input_status_pengiriman{{$s->id}}">
                                          </span>
                                          <br>
                                          <a onclick="return edit_status_pengiriman{{$s->id}}();" class="is-primary is-small is-pulled-center" style="color:white;"><span class="icon"><i class="fa fa-pencil"></i></span><span>Edit</span></a>
                                          <script>
                                             function edit_status_pengiriman{{$s->id}}()
                                             {
                                                (async function getStatusPengiriman () {
                                                const {value: status_pengiriman} = await Swal.fire({
                                                title: 'Pilih Status Pengiriman',
                                                input: 'select',
                                                inputValue: "{{$s->status_pengiriman}}",
                                                inputOptions: {
                                                   1: 'Sedang Di Proses',
                                                   2: 'Sedang Di Packing',
                                                   3: 'Kurir Ready',
                                                   4: 'Barang Sedang di Kirim',
                                                   5: 'Barang Sampai Tujuan',
                                                  
                                                },
                                                confirmButtonText:'Pilih',
                                                cancelButtonText:'Batal',
                                                inputPlaceholder: 'Pilih Status',
                                                showCancelButton: true,
                                                inputValidator: (value) => {
                                                   return new Promise((resolve) => {
                                                      if (value > '{{$s->status_pengiriman}}') {
                                                      resolve()
                                                      } else if(value==""||value=="{{$s->status_pengiriman}}") {
                                                         resolve("Pilih Status Terlebih Dahulu")
                                                      }else{
                                                         Swal.fire({
                                             title: 'Anda Yakin, Status Pengiriman Ini Sebelum Status Pengiriman Yang Sekarang ?',
                                             
                                             type: 'question',
                                             showCancelButton: true,
                                             confirmButtonColor: '#3085d6',
                                             cancelButtonColor: '#d33',
                                             confirmButtonText: 'Ya, Ubah Status!'
                                             }).then((result) => {
                                             if (result.value) {
                                             resolve()
                                             }
                                             })
                                                      }
                                                   })
                                                }
                                                })
                                             
                                                if (status_pengiriman) {
                                                   if(status_pengiriman>"{{$s->status_pengiriman}}"){
                                                      Swal.fire({
                                                      title: 'Anda Yakin Untuk Mengubah Status Pengiriman?',
                                                      
                                                      type: 'question',
                                                      showCancelButton: true,
                                                      confirmButtonColor: '#3085d6',
                                                      cancelButtonColor: '#d33',
                                                      confirmButtonText: 'Ya, Ubah Status!'
                                                      }).then((result) => {
                                                      if (result.value) {
                                                      $('#input_status_pengiriman{{$s->id}}').val(status_pengiriman);
                                                      $('#form-{{$s->id}}').submit();
                                                      }
                                                      })
                                                   }else{
                                                      $('#input_status_pengiriman{{$s->id}}').val(status_pengiriman);
                                                      $('#form-{{$s->id}}').submit();
                                                   }
                                             
                                                }
                                                })()
                                             }
                                          </script>
                                       </td>
                                       @else
                                       <script>
                                       function verified_status{{$s->id}}(){
                                          Swal.fire({
                                          title: 'Anda Ingin Memverifikasi Sewa Ini?',
                                        
                                          type: 'question',
                                          showCancelButton: true,
                                          confirmButtonColor: '#3085d6',
                                          cancelButtonColor: '#d33',
                                          confirmButtonText: 'Ya, Verivikasi Sewa!'
                                          }).then((result) => {
                                          if (result.value) {
                                             $('#form-{{$s->id}}').submit();
                                          }
                                          })
                                          
                                       }
                                       </script>
                                       @endif
                                    <td class="{{$status=='verified'?'is-hidden':''}}"><a  onclick="lihat_gambar{{$s->id}}()">{!! $s->struk==null ?'<span class="icon"><i class="fa fa-eye-slash"></i></span>Belum Upload':'<span class="icon"><i class="fa fa-eye"></i></span>Sudah Upload'!!}</a></td>
                                       <?php 
                                       $user=User::find($s->id_user);
                                       ?>
                                         <script>
                                             function lihat_user{{$s->id}}(){
                                                (async function getFormValues() {
                                          const {value: file} = await Swal.fire({
                                             title: 'Data User',
                                           
                                             html:'<img src="{{$user->status_login==NULL?asset("images/user/$user->id/foto/$user->foto"):$user->foto}}">'+
                                             '<table class="table is-fullwidth">'+
                                             '<tbody>'+
                                             '<tr class="is-capitalized">'+
                                                   '<td><strong>Nama User</strong></td>'+
                                                   '<td>:</td>'+
                                                   '<td>{{$user->name}}</td>'+
                                             '</tr>'+
                                             '<tr class="is-capitalized">'+
                                                   '<td><strong>Alamat</strong></td>'+
                                                   '<td>:</td>'+
                                                   '<td>{{$user->alamat}}</td>'+
                                             '</tr>'+
                                             '<tr class="is-capitalized">'+
                                                   '<td><strong>No Telpon</strong></td>'+
                                                   '<td>:</td>'+
                                                   '<td>{{'+628'.$user->phone}}</td>'+
                                             '</tr>'+
                                             '<tr class="is-capitalized">'+
                                                   '<td><strong>Login Media</strong></td>'+
                                                   '<td>:</td>'+
                                                   '<td>{{$user->status_login==null?"Login Web":$user->status_login}}</td>'+
                                             '</tr>'+
                                             '</tbody>'+
                                             '</table>',
                                          })
                                          })()
                                             }
                                             </script>
                                    <td class=""><a onclick="return lihat_user{{$s->id}}();">Lihat User</a></td>
                                       <td class="">
                                          @if($s->status=="unverified"&& $s->struk!=null)
                                          <div class="field has-addons">
                                             <input type="hidden" name="status" value="verified">
                                             <a id="" onclick="return verified_status{{$s->id}}();" class="button is-primary is-small is-fullwidth is-success">
                                             <span class="icon is-small ">
                                             <i class="fa fa-check"></i>
                                             </span>
                                             </a>
                                          </div>
                                          @else
                                          <a id="delete_disabled_{{$b->id}}" class="is-fullwidth" >
                                                 Disabled
                                                </a>
                                          @endif
                                       </td>
                                 </form>
                                 </tr>
                                 <script>
                                 function lihat_gambar{{$s->id}}()
                                    {
                                       (async function getFormValues() {
                                       const {value: file} = await Swal.fire({
                                          title: 'Gambar Struk',
                                        
                                          html:'<img src="{{$s->struk!=null?asset("images/user/$s->id_user/data/struk/$s->struk"):''}}">',
                                       })
                                       })()
                                       
                                                                           
                                    }
                                 </script>
                                 @endforeach
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
</section>
@endsection
@section('scripts')
<script>
   function myFunction() {
     var input, filter, table, tr, td, i, txtValue;
     input = document.getElementById("myInput");
     filter = input.value.toUpperCase();
     table = document.getElementById("myTable");
     tr = table.getElementsByTagName("tr");
     for (i = 0; i < tr.length; i++) {
       td = tr[i].getElementsByTagName("td")[0];
       if (td) {
         txtValue = td.textContent || td.innerText;
         if (txtValue.toUpperCase().indexOf(filter) > -1) {
           tr[i].style.display = "";
         } else {
           tr[i].style.display = "none";
         }
       }       
     }
   }
</script>
@endsection

