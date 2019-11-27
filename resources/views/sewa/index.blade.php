

@extends('layouts.manage')
@section('content')
<section class="wrapper">
   <section class="section">
      <div class="container is-fluid">
         <div class="columns columnsholder is-block">
            <div class="column columnfull">
               <div class="normalcorner">
                  <div class="field">
                     <h1 class="button control truncate is-primary is-large is-expanded is-fullwidth is-cursor-auto has-text-left">History Order</h1>
                  </div>
               </div>
               @if($notif==1)
                  @if($su!=null)
                     @include('layouts.manage._includes.history_sewa._struk')
                     <?php $id=$su->id; ?>
                     @include('layouts.manage._includes.form.delete')
                  @endif
                  @if($sus!=null)
                     @include('layouts.manage._includes.history_sewa._menunggu')
                  @endif
               @endif     
                  @if(count($sv)!=0)
                     @include('layouts.manage._includes.history_sewa._sukses')
               
                  @endif
            </div>
         </div>
      </div>
   </section>
</section>

@endsection
@section('scripts')
<script >

function openFileOption()
      {
         document.getElementById("file1").click();
          
       }
     
   function readURL(input)
   {
      $('#tombol_submit').removeClass('is-hidden');
                  
   }
   function delSewa(){
      Swal.fire({
  title: 'Anda Yakin Membatalkan Sewa Ini?',

  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, Hapus Sewa!'
   }).then((result) => {
      if (result.value) {
   $('#hapus-sewa').submit();
      }
   });
   }
   function submitForm()
   {
      $('#upload_struk').submit();
   }    

           
</script>

@endsection

