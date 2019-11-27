

@extends('layouts.manage')
@section('content')
{{-- <script src="https://static.mod.io/html/external/tinymce/tinymce.min.js"></script> --}}
  

<section class="section">
   <div class="container is-fluid">
      <div class="columns columnsholder is-block">
         <div class="column columnfull">
            <div class="normalbox formbox" id="membersform">
               <div class="normalcorner">
                  <div class="field has-addons">
                     <h1 class="button control  is-primary is-large is-expanded is-fullwidth is-cursor-auto has-text-left is-uppercase">Formulir Sewa Barang </h1>

                    
                     <p class="control">
                        <a class="button is-dark is-large passwordicon is-uppercase" >
                            {{$b->kategori}}
                        </a>
                     </p>
                  </div>
               </div>
               
               <div class="body">
               <form id="form-sewa" action="{{route('sewa.store')}}" method="POST">
                  {{csrf_field()}}
                  
                    <div class="field row rowmembersavatar">
                            <label class="label" for="membersavatar">Nama Barang</label>
                         
                            <div class="field">
                            <p class="tempavatar helpertext">{{$b->nama}}</p>
                            </div>
                    </div>
                     <div class="field row rowmembersavatar">
                        <label class="label" for="membersavatar">Gambar</label>
                     
                        <div class="field">
                           <p class="tempavatar helpertext"></p>

                           <div  class="preview previewimage" style="max-width: 100px;">
                           <label  class="image is-dark" style="background-image: url('{{asset("images/items/$b->kategori/$b->merk/$b->id/$b->gambar")}}'); padding-top: 100%;">
                                 <span class="field fieldpreview has-addons is-centered-text">
                                    <span class="control add">
                                      
                                    </span>
                                    <span class="control handle" style="display: none;">
                                       <span class="button is-dark">
                                          <span class="icon">
                                             <svg class="fa icon-light-arrows">
                                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-light-arrows"></use>
                                             </svg>
                                          </span>
                                       </span>
                                    </span>
                                    <span class="control remove" style="display: none;">
                                       <span class="button csstooltip is-dark" title="Remove">
                                          <span class="icon">
                                             <svg class="fa icon-light-times">
                                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-light-times"></use>
                                             </svg>
                                          </span>
                                       </span>
                                    </span>
                                 </span>
                              </label>
                           </div>
                        </div>
                        <div class="field row rowmembersoptionsgroup">
                            <label class="label" for="membersinvisible">Pilihan Paket</label>
                            <div class="field">
                            <p class="control"><label class="radio is-block"><input type="radio" name="harga" value="{{$b->harga}}"  {{$sewa=="sewa-1-hari"?"checked":""}}> 1 Hari Rp.{{number_format($b->harga,2,",",".")}} </label></p>
                            <p class="control"><label class="radio is-block"><input type="radio" name="harga" value="{{$harga3hari}}"  {{$sewa=="sewa-3-hari"?"checked":""}}> 3 Hari Rp.{{number_format($harga3hari,2,",",".")}} </label></p>
                            <p class="control"><label class="radio is-block"><input type="radio" name="harga" value="{{$harga5hari}}"  {{$sewa=="sewa-5-hari"?"checked":""}}> 5 Hari Rp.{{number_format($harga5hari,2,",",".")}} </label></p>
                            <p class="control"><label class="radio is-block"><input type="radio" name="harga" value="{{$harga7hari}}"  {{$sewa=="sewa-7-hari"?"checked":""}}> 7 Hari Rp.{{number_format($harga7hari,2,",",".")}} </label></p>
                          
                            </div>
                         </div>
                        
                     </div>
                     <div class="field row rowmembersemail rowrequired">
                        <label class="label" >Alamat ( Lengkap )<em>*</em></label>
                        <div class="field">
                           <p class="control"><input type="address" value="{{Auth::User()->alamat}}" name="alamat" maxlength="100"  class="input" required="required"></p>
                        </div>
                     </div>
                    

                  <input type="hidden" name="id_barang" value="{{$b->id}}">
           
                         
                     <label class="label" >Nomor Telpon ( Nomor Aktif )<em>*</em></label>
                     <div class="field has-addons">
                          
                        <p class="control">
                           <span class="button is-static is-hidden-mobile">+ 628 </span>
                        </p>
                        <p class="control is-expanded">
                        <input type="phone" onkeypress='validate(event)' name="phone" maxlength="13" value="{{Auth::User()->phone}}" class="input">
                        </p>
                     </div>
                     <label class="label" >Pembayaran Via Transfer ( klik logo )<em>*</em></label>
                    
                     <ul class="help is-large is-warning">
                         <li>Klik Logo Untuk Memilih Pembayaran</li>
                        
                        
                     </ul>
                     <div class="field has-addons">
                          
                      
                        <div class="column is-6-touch " id="klik-bank-bca">
                           <div class="notification is-block " id="pilih-bca">
                           <img id="klik-bank-bca" style="height:100px;width:100%;" src="{{asset('images/bca-logo.png')}}" >
                            
                             
                     
                            
                        </div>
                        <table class="table is-narrow is-hidden" style="">
                              <tbody>
                                    <tr style="font-size:1.5em;">
                                          <td></td>
                                          <td>Data Rekening</td>
                                          <td></td>
                                       </tr>
                                    <tr style="font-size:1.5em;">
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>Faiz Ananda</td>
                                 </tr>
                                 <tr style="font-size:1.5em;">
                                       <td>No Rekening</td>
                                       <td>:</td>
                                       <td>0070206501</td>
                                    </tr>
                                    
                              </tbody>
                        </table>
                     </div>
                   
                     <div class="column is-6-touch" id="klik-bank-mandiri">
                           <div class="notification is-block " id="pilih-mandiri">
                           <img id="klik-bank-mandiri" style="height:100px;width:100%;" src="{{asset('images/mandiri-logo.png')}}" >
                              
                                 
                            
                        </div>
                        <table class="table is-narrow is-hidden is-hidden" style="">
                              <tbody>
                                    <tr style="font-size:1.5em;">
                                    <td></td>
                                    <td>Data Rekening</td>
                                    <td></td>
                                 </tr>
                                    <tr style="font-size:1.5em;">
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>Faiz Ananda</td>
                                 </tr>
                                 <tr style="font-size:1.5em;">
                                       <td>No Rekening</td>
                                       <td>:</td>
                                       <td>1200010166952</td>
                                    </tr>
                                    
                              </tbody>
                        </table>
                     </div>
                     </div>
                        <label class="label">Note:*</label>
                        <ul class="help is-large">
                            <li>Barang Di Antar Oleh Kurir PINJAM.APET</li>
                            <li>Ketika Barang Sampai Tujuan Anda Akan Di Data Ulang Oleh Kurir Kami</li>
                           
                        </ul>
                        <input id="input-bank" type="hidden" name="bank" required>
                        <div class="field row rowmemberssubmit buttons"><div class="field is-grouped-right is-grouped"><p class="control"><a  id="sewa-submit" class="button is-primary">Lanjut</a></p></div></div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection

@section('scripts')
    <script>
      function validate(evt) {
  var phone = evt || window.event;

  // Handle paste
  if (phone.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = phone.keyCode || phone.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    phone.returnValue = false;
    if(phone.preventDefault) phone.preventDefault();
  }
}


$('#klik-bank-bca').on('click',function(){
   $('#klik-bank-mandiri').find('table').addClass('is-hidden');
   $(this).find('table').removeClass('is-hidden');
   $('#pilih-mandiri').removeClass('is-success');
   $('#pilih-bca').addClass('is-success');
   $('#input-bank').val('bca');
});
$('#klik-bank-mandiri').on('click',function(){
   $('#klik-bank-bca').find('table').addClass('is-hidden');
   $(this).find('table').removeClass('is-hidden');
   $('#pilih-bca').removeClass('is-success');
   $('#pilih-mandiri').addClass('is-success');
   $('#input-bank').val('mandiri');
});
$('#sewa-submit').on('click',function(){
  if($('#input-bank').val()!="")
  {
   $('#form-sewa').submit();
  }else{
   Swal.fire({
  title: 'Pilih Transaksi Terlebih Dahulu',
  timer: 2000,
  type: 'warning',

   })
  }
});
      
</script>
@endsection