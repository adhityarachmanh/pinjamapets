



<html lang="en" >
        <head>
            <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <title>{{ config('app.name', 'Laravel') }}</title>
           <link rel="stylesheet" href="{{asset('css/login.css')}}">
           <link rel="stylesheet" href="{{asset('css/app.css')}}">
           <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
         </script>
        </head>
        
        <body id="widget" style="background-color:#171727;">
           <div  class="container is-fluid" style="width:600px;">
              <div id="wheader">
                 <h1 class="title is-4 is-marginless">
                    Register 
     
                    <a href="/"  >
                        <i class="fa fa-home" ></i>
                       </a>
                 </h1>
                 <hr>
              </div>
              <div class="formbox">
                 <div>
                     
                 <form  action="{{route('register')}}" method="POST" role="form">
                     {{csrf_field()}}
                   
                       <input type="hidden" name="referer" value="" id="membersreferer">
                       <div class="field row rowmembersintro">
                          <div class="field">
                             <p>
                             Sudah Pernah Mendaftar? <a href="{{route('login')}}" class="thickbox"  >Login Sekarang</a> .
                              Lupa <a href="" class="thickbox"  target="_self">password atau username</a>
                                ?
                             </p>
                          </div>
                       </div>
                       <div class="field row rowmembersusername rowrequired">
                        <label class="label" for="membersusername">
                        Nama<em>*</em>
                        </label>
                        <div class="field">
                               <p class="control">
                                       <input 
                                          type="text" 
                                          class="input {{$errors->has('name') ? 'is-danger' : ''}}"
                                          name="name"
                                          placeholder="Nama Anda"
                                          required
                                          >
                                       @if($errors->has('name'))
                                    <p class="help is-danger">{{$errors->first('name')}}</p>
                                    @endif
                              <style>
                                 span.cdacdaeceeffeformouter span span span span span span {
                                 display: none;
                                 }
                                 span.cdacdaeceeffeformouter {
                                 display: inline;
                                 }
                              </style>
                           </p>
                        </div>
                     </div>
                       <div class="field row rowmembersusername rowrequired">
                          <label class="label" for="membersusername">
                          Email<em>*</em>
                          </label>
                          <div class="field">
                                 <p class="control">
                                         <input 
                                            type="text" 
                                            class="input {{$errors->has('email') ? 'is-danger' : ''}}"
                                            name="email"
                                            placeholder="Username"
                                            required
                                            >
                                         @if($errors->has('email'))
                                      <p class="help is-danger">{{$errors->first('email')}}</p>
                                      @endif
                                <style>
                                   span.cdacdaeceeffeformouter span span span span span span {
                                   display: none;
                                   }
                                   span.cdacdaeceeffeformouter {
                                   display: inline;
                                   }
                                </style>
                             </p>
                          </div>
                       </div>
                       <div class="field row rowmemberspassword rowrequired">
                          <label class="label" for="memberspassword">
                          Password<em>*</em>
                          </label>
                          <div class="field">
                             <p class="control">
                                     <input 
                                     type="password" 
                                     class="input {{$errors->has('password') ? 'is-danger' : ''}}"
                                     name="password"
                                     placeholder="Password"
                                     required
                                     >
                                     @if($errors->has('password'))
                       <p class="help is-danger">{{$errors->first('password')}}</p>
                       @endif
                             </p>
                          </div>
                       </div>
                       <div class="field row rowmemberspassword rowrequired">
                            <label class="label" for="memberspassword">
                            Ulangi Password<em>*</em>
                            </label>
                            <div class="field">
                               <p class="control">
                                       <input 
                                       type="password" 
                                       class="input {{$errors->has('password_confirmation') ? 'is-danger' : ''}}"
                                       name="password_confirmation"
                                       placeholder="Konfirmasi Password"
                                       required
                                       >
                                       @if($errors->has('password_confirmation'))
                         <p class="help is-danger">{{$errors->first('password_confirmation')}}</p>
                         @endif
                               </p>
                            </div>
                         </div>
                       <div class="field row rowmembersbuttonsgroup buttons">
                          <div class="field is-grouped-right is-grouped">
                           
                             <p class="control">
                                <a href="{{route('login')}}" id="membersregister" class="button is-text" target="_self">Login</a>
                             </p>
                             <p class="control">
                                <button type="submit" class="button is-primary">Daftar</button>
                             </p>
                          </div>
                       </div>
                       <div class="field row rowmembersdivider">
                          <div class="field">
                             <div class="field is-grouped is-divider">
                                <div class="control is-expanded is-marginless">
                                   <hr>
                                </div>
                                <div class="control title is-marginless">OR</div>
                                <div class="control is-expanded is-marginless">
                                   <hr>
                                </div>
                             </div>
                          </div>
                       </div>
                       <div class="field row rowmemberslogin">
                          <div class="field">
                             <div class="field is-grouped">
                              
                               
                                <p class="control is-expanded">
                                   <a href="login/google" class="button csstooltip is-google" original-title="Login with Google">
                                      <span class="icon">
                                         <svg class="fa icon-brands-google" aria-label="Google">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-brands-google"></use>
                                         </svg>
                                      </span>
                                      <span class="is-hidden-touch is-hidden-desktop-only">Google</span>
                                   </a>
                                </p>
                              
                                <p class="control is-expanded">
                                <a href="login/facebook"   class="button csstooltip is-facebook">
                                      <span class="icon">
                                         <svg class="fa icon-brands-facebook" aria-label="Facebook">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-brands-facebook"></use>
                                         </svg>
                                      </span>
                                      <span class="is-hidden-touch is-hidden-desktop-only">Facebook</span>
                                   </a>
                                   
                                </p>
                                <p class="control is-expanded">
                                 <a href="login/instagram"   class="button csstooltip is-instagram">
                                       <span class="icon" style="width:35px;">
                                       <img src="{{asset('images/instagram.png')}}" alt="">
                                       </span>
                                       <span class="is-hidden-touch is-hidden-desktop-only">Instagram</span>
                                    </a>
                                    
                                 </p>
                             </div>
                          </div>
                       </div>
                    </form>
                 </div>
              </div>
           </div>
           @include('layouts.manage._includes.svg._svg') 
         
        </body>
     </html>
    
