

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
                        <h1 class="button control truncate is-primary is-large is-expanded is-fullwidth is-cursor-auto has-text-left is-capitalized">List Barang {{!empty($status)?$status:''}}</h1>
                     </div>
                  </div>
               <a id="tambah_barang" onclick="return tambah_barang();" class="button is-primary is-medium m-t-10 {{Request::path()=="admin/manage-barang/stock-habis/list"?'is-hidden':''}}">
                  <span class="icon is-small ">
                  <i class="fa fa-plus"></i>
                  </span>
                  <span> Tambah Barang</span>
                  </a>
                  
                  <form action="{{route('manage-barang.store')}}" id="form_tambah" class="is-hidden" method="POST" enctype="multipart/form-data">
                     {{csrf_field()}}  
                     <input type="file" onchange="return bacaURL(this);" id="input_gambar" name="gambar" class="input">
                     <input type="text" id="input_nama" name="nama" class="input">
                     <input type="text" id="input_merk" name="merk" class="input">
                     <input type="text" id="input_kategori" name="kategori" class="input">
                     <input type="text" id="input_harga" name="harga" class="input">
                     <input type="text" id="input_stock" name="stock" class="input">
                  </form>
                  <div class="body m-t-20">
                     <div class="field row rowapikeys ">
                        <div class="field ">
                           <table class="table is-bordered is-hoverable m-t-20">
                              <thead>
                                 <tr class="rowtitle is-selected">
                                    <th>ID</th>
                                    <th>Nama Barang</th>
                                    <th class="">Gambar</th>
                                    <th class=" ">Harga</th>
                                    <th class=" ">Kategori</th>
                                    <th class=" ">Merk</th>
                                    <th class="">Tersedia</th>
                                    <th class="">Deskripsi</th>
                                    <th class="">Key Pencarian</th>
                                    <th colspan="2" class=" has-text-centered">Opsi</th>
                                 </tr>
                              </thead>
                              <tbody>
                                <?php $no=1; ?>
                                 @foreach($barangs as $b)
                                 <form action="{{route('manage-barang.update',$b->id)}}" id="form_update{{$b->id}}" class="is-hidden" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{method_field('PATCH')}}
                                    <input type="file" onchange="return bacaURL_{{$b->id}}(this);" id="input_gambar{{$b->id}}" name="gambar" class="input is-hidden">
                                    <input type="text" id="input_nama{{$b->id}}" name="nama" class="input is-hidden">
                                    <input type="text" id="input_merk{{$b->id}}" name="merk" class="input is-hidden">
                                    <input type="text" id="input_kategori{{$b->id}}" name="kategori" class="input is-hidden">
                                    <input type="text" id="input_harga{{$b->id}}" name="harga" class="input is-hidden">
                                 </form>
                                 <form action="{{route('manage-barang.update',$b->id)}}" id="form_stock{{$b->id}}" class="is-hidden" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    {{method_field('PATCH')}}
                                    <input type="text" id="input_stock{{$b->id}}" name="stock" class="input is-hidden">
                                 </form>
                                 <form action="{{route('manage-barang.update',$b->id)}}" id="form_keyword{{$b->id}}" class="is-hidden" method="POST">
                                    {{csrf_field()}}
                                    {{method_field('PATCH')}}
                                    <input type="text" id="input_keyword{{$b->id}}" name="keyword" class="input is-hidden">
                                 </form>
                                 <script>
                                    function lihat_gambar{{$b->id}}()
                                    {
                                       (async function getFormValues() {
                                       const {value: file} = await Swal.fire({
                                          title: 'Gambar {{$b->nama}}',
                                        
                                          html:'<img src="{{asset("images/items/$b->kategori/$b->merk/$b->id/$b->gambar")}}">',
                                       })
                                       })()
                                       
                                                                           
                                    }
                                    function tambah_stock{{$b->id}}(){
                                       (async function getFormValues() {
                                       const {value: formValues} = await Swal.fire({
                                       title: 'Tambah Stock',
                                       showCancelButton:true,
                                       confirmButtonText:'Tambah Stock',
                                       html:
                                       '<p>Stock Barang : {{$b->quantity}}</p>'+
                                       '<input type="number" id="swal-stock{{$b->id}}" onkeypress="valiNomor(event)" class="swal2-input" min="1" placeholder="Tambah Stock" value="1">',
                                    
                                                                              
                                       focusConfirm: false,
                                    
                                       })
                                    
                                       if (formValues) {
                                    
                                          $('#input_stock{{$b->id}}').val($('#swal-stock{{$b->id}}').val());
                                          Swal.fire({
                                          title: 'Anda Yakin Untuk Menambah Stock?',
                                        
                                          type: 'question',
                                          showCancelButton: true,
                                          confirmButtonColor: '#3085d6',
                                          cancelButtonColor: '#d33',
                                          confirmButtonText: 'Ya, Tambah Stock!'
                                          }).then((result) => {
                                          if (result.value) {
                                             $('#form_stock{{$b->id}}').submit();
                                          }
                                          })
                                         
                                       }
                                       })()
                                    }
                                    function edit_barang_{{$b->id}}(){
                                             (async function getFormValues() {
                                       const {value: formValues} = await Swal.fire({
                                       title: 'Edit Barang',
                                       showCancelButton:true,
                                       confirmButtonText:'Edit Barang',
                                       html:
                                       '<img src="{{asset("images/items/$b->kategori/$b->merk/$b->id/$b->gambar")}}" id="swal-gambar{{$b->id}}" class="swal2-images" >'+
                                       '<button type="button" id="swal-button{{$b->id}}" onclick="return clickAlih{{$b->id}}();" class="swal2-button is-fullwidth">Ganti Gambar</button>'+
                                       '<input id="swal-nama{{$b->id}}" onkeypress="valiNomorHuruf(event)" class="swal2-input" placeholder="Nama Barang" value="{{$b->nama}}">'+
                                       '<input id="swal-merk{{$b->id}}" onkeypress="valiHuruf(event)" class="swal2-input" placeholder="Merk Barang" value="{{$b->merk}}">'+
                                       '<input id="swal-kategori{{$b->id}}"  class="swal2-input" value="{{$b->kategori}}" disabled>'+
                                       '<input id="swal-harga{{$b->id}}" onkeypress="valiNomor(event)" class="swal2-input" placeholder="Harga Barang" value="{{$b->harga}}">',
                                    
                                                                              
                                       focusConfirm: false,
                                    
                                       })
                                    
                                       if (formValues) {
                                          $('#input_nama{{$b->id}}').val($('#swal-nama{{$b->id}}').val());
                                          $('#input_merk{{$b->id}}').val($('#swal-merk{{$b->id}}').val());
                                          $('#input_kategori{{$b->id}}').val($('#swal-kategori{{$b->id}}').val());
                                          $('#input_harga{{$b->id}}').val($('#swal-harga{{$b->id}}').val());
                                          $('#input_stock{{$b->id}}').val($('#swal-stock{{$b->id}}').val());
                                          Swal.fire({
                                          title: 'Anda Yakin Edit Barang Ini?',
                                        
                                          type: 'question',
                                          showCancelButton: true,
                                          confirmButtonColor: '#3085d6',
                                          cancelButtonColor: '#d33',
                                          confirmButtonText: 'Ya, Edit Barang!'
                                          }).then((result) => {
                                          if (result.value) {
                                             $('#form_update{{$b->id}}').submit();
                                          }
                                          })
                                         
                                       }
                                       })()
                                       $('#swal-button{{$b->id}}').click(function(){
                                    
                                       $('#input_gambar{{$b->id}}').click();
                                       
                                          
                                       });
                                          }
                                    
                                         
                                          
                                          
                                          
                                          function bacaURL_{{$b->id}}(input) {
                                    
                                    
                                          if (input.files && input.files[0]) {
                                             var reader = new FileReader();
                                    
                                             reader.onload = function (e) {
                                          
                                                $('#swal-gambar{{$b->id}}').removeAttr('src');
                                                $('#swal-gambar{{$b->id}}')
                                                      .attr('src',e.target.result );
                                                      
                                             };
                                    
                                             reader.readAsDataURL(input.files[0]);
                                          }
                                       }
                                       function keyword_data{{$b->id}}()
                                       {
                                          (async function getText () {
                                             
                                                const {value: text} = await Swal.fire({
                                                title:'Edit Keyword Pencarian',
                                               
                                                html: '<p><strong>Gunakan koma ( , )<strong></p>'+
                                                '<textarea id="swal-keyword" class="swal2-textarea">{{$b->keyword}}</textarea>',
                                                confirmButtonText:'Edit Keyword',
                                                cancelButtonText:'Batal',
                                                showCancelButton: true
                                                })

                                                if (text) {
                                                   $('#input_keyword{{$b->id}}').val($('#swal-keyword').val());
                                                   $('#form_keyword{{$b->id}}').submit();
                                                }
                                                })()
                                                
                                          }
                                 </script>
                                 <tr >
                                    <td>{{$no++}}</td>
                                    <td>{{$b->nama}}</td>
                                    <td><a onclick="return lihat_gambar{{$b->id}}();">Lihat Gambar</a></td>
                                    <td>{{'Rp '.number_format($b->harga,2,',','.').' / Hari'}}</td>
                                    <td>{{$b->kategori}}</td>
                                    <td>{{$b->merk}}</td>
                                    <td class="{{$b->quantity==0?'is-hidden':''}}"><span>{{$b->quantity}}</span><a onclick="return tambah_stock{{$b->id}}();"  id="tombol_tambah_stock{{$b->id}}" class="button is-small is-pulled-right"><span class="icon" id="quantity_{{$b->id}}"><i class="fa fa-plus"></i></span></a></td>
                                    <td class="{{$b->quantity==0?'':'is-hidden'}}">
                                      
                                  
                                       <span>0</span><a onclick="return tambah_stock{{$b->id}}();"  id="tombol_tambah_stock{{$b->id}}" class="button is-small is-pulled-right"><span class="icon" id="quantity_{{$b->id}}"><i class="fa fa-plus"></i></span></a>
                                   
                                    </td>
                                    <td><a href="{{route('manage-barang.edit',$b->id)}}">Lihat Deskripsi</a></td>
                                  <td><a onclick="keyword_data{{$b->id}}();">Lihat Keyword</a></td>

                                  
                                    <td>
                                       <a id="tombol_edit_barang_{{$b->id}}" onclick="return edit_barang_{{$b->id}}();" class="button is-primary is-small is-fullwidth" >
                                       <span class="icon is-small ">
                                       <i class="fa fa-pencil"></i>
                                       </span>
                                       <span> Edit</span>
                                       </a>
                                       <a id="tombol_edit_success_barang_{{$b->id}}" onclick="" class="button is-success is-small is-fullwidth is-hidden" >
                                       <span class="icon is-small ">
                                       <i class="fa fa-check"></i>
                                       </span>
                                       <span> Edit</span>
                                       </a>
                                    </td>
                                    <td>
                                       {{-- <a  class="button is-danger is-small is-fullwidth" style="{{$b->quantity==0?'':'display:none'}}">
                                       <span class="icon is-small ">
                                       <i class="fa fa-remove"></i>
                                       </span>
                                       <span> Delete</span>
                                       </a> --}}
                                       <a id="delete_disabled_{{$b->id}}" class="is-fullwidth" >
                                       Delete Disabled
                                       </a>
                                    </td>
                                 </tr>
                                 @endforeach
                              </tbody>
                           </table>
                           {{$barangs->links()}}
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
   function tambah_barang(){
     (async function getImage () {
   const {value: dataForm} = await Swal.fire({
   title: 'Tambah Barang',
   confirmButtonText:'Tambah Barang',
   cancelButtonText:'Batal',
   showCancelButton:true,
   html:
   
   '<img src="" id="swal-gambar" class="swal2-images is-hidden">'+
   '<button type="button" id="swal-button" class="swal2-button is-fullwidth">Upload Gambar</button>'+
   '<input id="swal-nama" onkeypress="valiNomorHuruf(event)" class="swal2-input" placeholder="Nama Barang">'+
   '<input id="swal-merk" onkeypress="valiHuruf(event)" class="swal2-input" placeholder="Merk Barang">'+
   '<input id="swal-kategori"  class="swal2-input" value="{{$status}}" disabled>'+
   '<input id="swal-harga" onkeypress="valiNomor(event)" class="swal2-input" placeholder="Harga Barang">'+
   '<input type="number" id="swal-stock" onkeypress="valiNomor(event)" min="1" value="1" class="swal2-input" placeholder="Stock Barang">',
   
   
   })
   
   if(dataForm)
   {
   
   $('#input_nama').val($('#swal-nama').val());
   $('#input_merk').val($('#swal-merk').val());
   $('#input_kategori').val($('#swal-kategori').val());
   $('#input_harga').val($('#swal-harga').val());
   $('#input_stock').val($('#swal-stock').val());
   Swal.fire({
                                          title: 'Anda Yakin Untuk Menambah Barang?',
                                        
                                          type: 'question',
                                          showCancelButton: true,
                                          confirmButtonColor: '#3085d6',
                                          cancelButtonColor: '#d33',
                                          confirmButtonText: 'Ya, Tambah Barang!'
                                          }).then((result) => {
                                          if (result.value) {
                                             $('#form_tambah').submit();
                                          }
                                          })
                                         
   
   
   }
   
   })()
   $('#swal-button').click(function(){
    
   $('#input_gambar').click();
   
   
   });
   
   
   }
   function bacaURL(input) {
   
   
          if (input.files && input.files[0]) {
              var reader = new FileReader();
      
              reader.onload = function (e) {
               $('#swal-gambar').removeClass('is-hidden');
            
                  $('#swal-gambar')
                      .attr('src',e.target.result );
                      
              };
      
              reader.readAsDataURL(input.files[0]);
          }
      }
      function valiNomor(evt) {
   var phone = evt || window.event;
   
   // Handle paste
   if (phone.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
   } else {
   // Handle key press
      var key = phone.keyCode || phone.which;
      key = String.fromCharCode(key);
   }
   var regex = /[0-9]/;
   if( !regex.test(key) ) {
    phone.returnValue = false;
    if(phone.preventDefault) phone.preventDefault();
   }
   }
   function valiNomorHuruf(evt) {
   var phone = evt || window.event;
   
   // Handle paste
   if (phone.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
   } else {
   // Handle key press
      var key = phone.keyCode || phone.which;
      key = String.fromCharCode(key);
   }
   var regex = /[0-9]|[a-z]|[A-Z]| /;
   if( !regex.test(key) ) {
    phone.returnValue = false;
    if(phone.preventDefault) phone.preventDefault();
   }
   }
   function valiHuruf(evt) {
   var phone = evt || window.event;
   
   // Handle paste
   if (phone.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
   } else {
   // Handle key press
      var key = phone.keyCode || phone.which;
      key = String.fromCharCode(key);
   }
   var regex = /[a-z]|[A-Z]| /;
   if( !regex.test(key) ) {
    phone.returnValue = false;
    if(phone.preventDefault) phone.preventDefault();
   }
   }
</script>
@endsection

