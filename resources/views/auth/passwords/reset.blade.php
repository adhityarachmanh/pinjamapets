



<html lang="en" >
        <head>
              <title>{{ config('app.name', 'Laravel') }}</title>
              <meta name="csrf-token" content="{{ csrf_token() }}">
           <link rel="stylesheet" href="{{asset('css/login.css')}}">
           <link rel="stylesheet" href="{{asset('css/app.css')}}">
           <script>
                window.Laravel = {!! json_encode([
                    'csrfToken' => csrf_token(),
                ]) !!};
             </script>
        </head>
        
        <body id="widget" style="background-color:#171727;">
           <div  class="container is-fluid" style="width:600px;;">
              <div id="wheader">
                 <h1 class="title is-4 is-marginless">
                    Reset Password 
     
                    <a href="/"  >
                     <i class="fa fa-home" ></i>
                    </a>
                 </h1>
                 <hr>
              </div>
              <div class="formbox" id="membersform">
                 <div>
                     
                 <form action="{{route('password.request') }}" method="post">
                     {{csrf_field()}}
      
                     <input type="hidden" name="token" value="{{ $token }}">

                     
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
                          Password Baru<em>*</em>
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
                            Ulang Password Baru<em>*</em>
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
                                <button type="submit" id="memberssubmit" class="button is-primary">Reset Password</button>
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
   
{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
