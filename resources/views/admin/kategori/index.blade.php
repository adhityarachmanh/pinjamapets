

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
                        <h1 class="button control truncate is-primary is-large is-expanded is-fullwidth is-cursor-auto has-text-left is-capitalized">List {{!empty($status)?$status:''}}</h1>
                     </div>
                  </div>
                  <div class="notification tooltip is-warning">
                     <div class="content">
                        <label for="" class="label">Note:</label>
                        <p>Kategori Yang Sudah Berisi Konten atau Barang Tidak Dapat di Hapus dan Juga di Edit. Karena Akan Mempengaruhi Sistem</p>
                     </div>
                  </div>
                  
                  <a onclick="tambah_kategori();" class="button is-primary is-medium ">
                  <span class="icon is-small ">
                  <i class="fa fa-plus"></i>
                  </span>
                  <span> Tambah Kategori</span>
                  </a>
                  <form id="tambah_kategori_form" action="{{route('manage-kategori.store')}}" method="POST" class="is-hidden">
                     {{csrf_field()}}
                     <input id="input_tambah" name="nama" class="input" type="text" required>
                  </form>
                  <div class="body m-t-20">
                     <div class="field row rowapikeys">
                        <div class="field">
                           <table class="table tablebrowse is-bordered is-hoverable">
                              <thead>
                                 <tr class="rowtitle is-selected">
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th class=" ">Jumlah Barang</th>
                                    <th colspan="2" class="  has-text-centered">Opsi</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php  
                                    $no=1; 
                                    use App\Barang;
                                    ?>
                                 @foreach($kategoris as $k)
                                 <form id="form_edit_{{$k->id}}" action="{{route('manage-kategori.update',$k->id)}}" method="POST" class="is-hidden">
                                    {{csrf_field()}}
                                    {{method_field('PATCH')}}
                                    <input id="input_nama{{$k->id}}" name="nama" class="input is-hidden" type="text" required>
                                    <script>
                                       function edit_kategori{{$k->id}}(){
                                             (async function getFormValues() {
                                       const {value: formValues} = await Swal.fire({
                                       title: 'Edit Kategori',
                                       showCancelButton:true,
                                       confirmButtonText:'Edit Kategori',
                                       html:
                                          '<input id="swal-nama{{$k->id}}" class="swal2-input" value="{{$k->nama}}" required>',
                                          
                                       focusConfirm: false,
                                       
                                       })
                                       
                                       if (formValues) {
                                          $('#input_nama{{$k->id}}').val($('#swal-nama{{$k->id}}').val());
                                          Swal.fire({
                                          title: 'Anda Yakin Untuk Mengubah Kategori {{$k->nama}} Menjadi '+$('#swal-nama{{$k->id}}').val()+'?',
                                        
                                          type: 'question',
                                          showCancelButton: true,
                                          confirmButtonColor: '#3085d6',
                                          cancelButtonColor: '#d33',
                                          confirmButtonText: 'Ya, Edit Kategori!'
                                          }).then((result) => {
                                          if (result.value) {
                                             $('#form_edit_{{$k->id}}').submit();
                                          }
                                          })
                                          
                                       }
                                       })()
                                          }
                                          function delete_kategori_{{$k->id}}(){
                                             Swal.fire({
                                             title: 'Ingin Menghapus Kategori {{$k->nama}} ?',
                                           
                                             type: 'question',
                                             showCancelButton: true,
                                             confirmButtonColor: '#3085d6',
                                             cancelButtonColor: '#d33',
                                             confirmButtonText: 'Ya, Hapu Kategori!'
                                             }).then((result) => {
                                             if (result.value) {
                                                $('#form_delete_{{$k->id}}').submit();
                                                
                                             }
                                             })
                                          }
                                    </script>
                                    <tr>
                                       <td id="no_{{$k->id}}">
                                          {{$no++}}
                                       </td>
                                       <td id="nos_{{$k->id}}" class="is-hidden">
                                       </td>
                                       <td id="nama_{{$k->id}}" class="is-capitalized">{{$k->nama}}</td>
                                       <td id="namas_{{$k->id}}" class="is-hidden">
                                       </td>
                                       <?php 
                                          $jumlah_barang=Barang::where('kategori',$k->slug)->count();
                                          ?>
                                       <td>{{$jumlah_barang==0?'Tidak Ada Barang':"$jumlah_barang Barang"}}</td>
                                       <td class="has-text-centered" > 
                                          <a onclick="return edit_kategori{{$k->id}}();" id="tombol_edit_{{$k->id}}" class="button is-primary is-small is-fullwidth" style="{{$jumlah_barang==0?'':"display:none;"}}">
                                          <span class="icon is-small ">
                                          <i class="fa fa-pencil"></i>
                                          </span>
                                          <span> Edit</span>
                                          </a>
                                          <a style="{{$jumlah_barang==0?'display:none;':""}}"> Edit Disabled</a>
                                       </td>
                                       <td class="has-text-centered" id="dis_create">
                                          <a  onclick="return delete_kategori_{{$k->id}}()" id="tombol_delete_{{$k->id}}" class="button is-danger is-small is-fullwidth" style="{{$jumlah_barang==0?'':"display:none;"}}">
                                          <span class="icon is-small ">
                                          <i class="fa fa-remove"></i>
                                          </span>
                                          <span> Delete</span>
                                          </a>
                                          <a style="{{$jumlah_barang==0?'display:none;':""}}"> Delete Disabled</a>
                                       </td>
                                    </tr>
                                 </form>
                                 <form action="{{route('manage-kategori.destroy',$k->id)}}" id="form_delete_{{$k->id}}" method="POST" class="is-hidden">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                 </form>
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
   function tambah_kategori(){
      (async function getFormValues () {
   const {value: formValues} = await Swal.fire({
   title: 'Tambah Kategori',
   showCancelButton:true,
   confirmButtonText:'Tambah Kategori',
   html:
    '<input id="swal-nama" class="swal2-input" required>',
   
   focusConfirm: false,
   
   })
   
   if (formValues) {
   $('#input_tambah').val($('#swal-nama').val());
   $('#tambah_kategori_form').submit();
   }
   })()
   }
</script>
@endsection

