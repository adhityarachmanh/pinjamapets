


<html lang="en" >
   <head>
         <title>{{ config('app.name', 'Laravel') }}</title>
      <link rel="stylesheet" href="{{asset('css/login.css')}}">
      <link rel="stylesheet" href="{{asset('css/app.css')}}">

   </head>
   
   <body id="widget" style="background-color:#171727;">
      <div  class="container is-fluid" style="width:600px;;">
         <div id="wheader">
            <h1 class="title is-4 is-marginless">
               Login 

               <a href="/"  >
                <i class="fa fa-home" ></i>
               </a>
            </h1>
            <hr>
         </div>
         <div class="formbox" id="membersform">
            <div>
                
            <form action="{{route('login')}}" method="post" name="membersform" target="">
                {{csrf_field()}}
              
                  <input type="hidden" name="referer" value="" id="membersreferer">
                  <div class="field row rowmembersintro">
                     <div class="field">
                        <p>
                        Tidak Memiliki Akun? <a href="{{route('register')}}" class="thickbox"  target="_self">Daftar Sekarang</a>
                        Lupa <a href="{{route('password.request')}}" class="thickbox" >password atau username</a>
                           ?
                        </p>
                     </div>
                  </div>
                  <div class="field row rowmembersusername rowrequired">
                     <label class="label" for="membersusername">
                     Username or email<em>*</em>
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
                  <div class="field row rowmembersbuttonsgroup buttons">
                     <div class="field is-grouped-right is-grouped">
                        <label class="checkbox control is-expanded">
                        <input  v-model="remember"
                        id="membersrememberme"
                        type="checkbox"
                        name="remember"
                        {{old('remember') ? 'checked' : ''}}
                        >
                        Ingat Saya ?
                        </label>
                        <p class="control">
                           <a href="{{route('register')}}" id="membersregister" class="button is-text" target="_self">Daftar</a>
                        </p>
                        <p class="control">
                           <button type="submit" name="members" value="Login" id="memberssubmit" class="button is-primary">Login</button>
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
{{-- @extends('layouts.app')

@section('content')
<div class="columns">
   <div class="column is-one-third is-offset-one-third m-t-100">
      <div class="card">
         <div class="card-content">
            <h1 class="title">Login</h1>
            <form action="{{route('login')}}" method="POST">
               {{csrf_field()}}
               <div class="field">
                  <label for="email" class="label">Username:</label>
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
                  </p>
               </div>
               <div class="field">
                  <label for="password" class="label">Password:</label>
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
               <b-checkbox
               class="m-t-20"
               v-model="remember"
               name="remember"
               {{old('remember') ? 'checked' : ''}}
               >
               Ingat Saya ?
               </b-checkbox>
               <button class="button is-primary is-outlined is-fullwidth m-t-20">Login</button>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection

 --}}
