@extends('layouts.manage')
@section('content')
    

<section class="wrapper">
        <section class="section">
           <div class="container is-fluid">
              <div class="columns columnsholder is-block">
                 <div class="column columnfull">
                    <div class="normalbox formbox" id="membersform">
                       <div class="normalcorner">
                          <div class="field has-addons">
                             <h1 class="button control truncate is-primary is-large is-expanded is-fullwidth is-cursor-auto has-text-left">Edit your profile</h1>
                           
                             @if(Auth::User()->status_login==null)
                             <p class="control">
                                <a href="" class="button csstooltip is-dark is-large passwordicon" title="Password">
                                   <span class="icon ">
                                          <span class="icon ">
                                                  <i class="fa fa-lock"></i>
                                                 </span>
                                   </span>
                                </a>
                             </p>
                           @endif
                          </div>
                       </div>
                      
@if(Auth::User()->status_login==null)
<div class="field row ">
      <label class="label" >Avatar</label>

      <div class="field">
         <p class="tempavatar helpertext"></p>
       
         <div  id="clickFoto" onclick="clickFoto();return;" class="preview previewimage" style="max-width: 100px;">
         <label  class="image background is-dark" id="terapFoto" style="background-image:url('{{Auth::User()->status_login!=null?Auth::User()->foto : asset('images/user/'.Auth::User()->id.'/foto/'.Auth::User()->foto)}}{{Auth::User()->foto==null?asset('images/user.png'):''}}');padding-top: 100%;">
               <span class="field has-addons is-centered-text">
              
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
   </div>
  @endif
   
                    
                       <div class="body">
                       <form action="{{route('user.update',$user->id)}}" method="post"  enctype="multipart/form-data">
                          {{csrf_field()}}
                           {{method_field('PUT')}}
                           <input type="file" id="avatar" name="gambar" style="display:none" onchange="changeFoto(this);">
                             <div class="field row rowmembersemail rowrequired">
                                <label class="label" for="membersemail">Alamat<em>*</em></label>
                                <div class="field">
                                   <p class="control">
                                       <input type="address" name="alamat" maxlength="100" class="input" value="{{$user->alamat}}" required="required"></p>
                                </div>
                             </div>
                             <label class="label" >Nomor Telpon ( Nomor Aktif )<em>*</em></label>
                             <div class="field has-addons">
                          
                                    <p class="control">
                                       <span class="button is-static is-hidden-mobile">+ 628 </span>
                                    </p>
                                    <p class="control is-expanded">
                                    <input type="phone" onkeypress='validate(event)' name="phone" maxlength="13" value="{{$user->phone}}" class="input">
                                    </p>
                                 </div>
                           
                            
                          
                             <div class="field row rowmemberssubmit buttons">
                                <div class="field is-grouped-right is-grouped">
                                   <p class="control"><button type="submit" name="members" value="Save profile" id="memberssubmit" class="button is-primary">Save profile</button></p>
                                </div>
                             </div>
                          </form>
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
       function clickFoto(){
         $('#avatar').click();
        
         
        
       }
       function changeFoto(input){
         if (input.files && input.files[0]) {
           var reader = new FileReader();
   
           reader.onload = function (e) {
               $('#terapFoto')
                   .attr('style',"background-image: url('"+e.target.result+"');padding-top:100%;widht:300px;height:200px;" );
                   
           };
   
           reader.readAsDataURL(input.files[0]);
       }
            
       }
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
    </script>
@endsection