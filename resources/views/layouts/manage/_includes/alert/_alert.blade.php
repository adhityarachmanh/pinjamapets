<?php use App\Sewa; ?>
@if(Auth::check())

<?php 


$su=Sewa::where('id_user',Auth::User()->id)
    ->where('struk',null)
    ->where('status','unverified')
    ->paginate();

$sus=Sewa::where('id_user',Auth::User()->id)
    ->where('struk','!=',null)
    ->where('status','unverified')
    ->paginate();
?>
@if(count($su)!=0)
<div class="notification tooltip is-danger">
  
        <div class="content">
           <label for="" class="label">Note:</label>
           @foreach ($su as $bank)
           @if($bank->bank=="bca")
           <p><img width="100" src="{{asset('images/bca-logo.png')}}">           <a href="{{route('sewa.index')}}">Transaksi Anda</a></p>
           <p><i class="fa fa-id-card"></i> Muhammad Faiz Ananda <i class="fa fa-credit-card"></i> 0070206501</p>
       
           @elseif($bank->bank=="mandiri")
           <p><img width="100" src="{{asset('images/mandiri-logo.png')}}">           <a href="{{route('sewa.index')}}">Transaksi Anda</a></p>
           <p><i class="fa fa-id-card"></i> Muhammad Faiz Ananda <i class="fa fa-credit-card"></i> 1200010166952</p>
       
           @endif
           @endforeach
      
       
       
        <p ><strong>Batas Waktu Upload Struk : <span id="response"></span></strong></p>
      </div>
     </div>


     
@elseif(count($sus)!=0)
<div class="notification tooltip is-warning">
  
        <div class="content">
           <label for="" class="label">Note:</label>
        <p>Diharapkan Menunggu Konfirmasi Dari Kami PINJAM.APET, Kami Akan Memproses Transaksi Anda Dengan cepat. Terimakasih <br>  <a href="{{route('sewa.index')}}">Transaksi Anda</a></p>
        <p ><strong>Batas Waktu Tersisa : <span id="response"></span></strong></p>
        </div>
     </div>
@endif
@endif

<script>
         setInterval(function(){
           var http=new XMLHttpRequest();
           http.open('GET',"{{route('countdown.tester')}}",false);
              http.send(null);
              document.getElementById('response').innerHTML=http.responseText;
              if(responseText=='done'){
                 alert();
              }
         },1000)
      </script>