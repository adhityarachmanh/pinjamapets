


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
                Login Admin
 
                <a href="/"  >
                 <i class="fa fa-home" ></i>
                </a>
             </h1>
             <hr>
          </div>
          <div class="formbox" id="membersform">
             <div>
                 
             <form action="{{ route('admin.login.submit') }}" method="post" name="membersform" target="">
                 {{csrf_field()}}
               
                 
                   <div class="field row rowmembersusername rowrequired">
                      <label class="label" for="membersusername">
                      Username Admin<em>*</em>
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
                         {{-- <label class="checkbox control is-expanded">
                         <input  v-model="remember"
                         id="membersrememberme"
                         type="checkbox"
                         name="remember"
                         {{old('remember') ? 'checked' : ''}}
                         >
                         Ingat Saya ?
                         </label> --}}
                         {{-- <p class="control">
                            <a href="{{route('register')}}" id="membersregister" class="button is-text" target="_self">Daftar</a>
                         </p> --}}
                         <p class="control">
                            <button type="submit" name="members" value="Login" id="memberssubmit" class="button is-primary">Login</button>
                         </p>
                      </div>
                   </div>
                  
                </form>
             </div>
          </div>
       </div>
       @include('layouts.manage._includes.svg._svg') 
     
    </body>
 </html>
 {{ route('admin.login.submit') }}