


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
                    Lupa Password 
     
                    <a href="/"  >
                     <i class="fa fa-home" ></i>
                    </a>
                 </h1>
                 <hr>
              </div>
              <div class="field row rowmembersintro">
                    <div class="field">
                       <p>
                            PINJAM.APET Akan Mengirimkan Link Reset Password, Ke Email Anda.
                       </p>
                    </div>
                 </div>
                 @if (session('status'))
                 <div class="is-alert">
                     <strong>{{ session('status') }}</strong>
                 </div>
             @endif

              <div class="formbox" id="membersform">
                 <div>
                     
                 <form action="{{ route('password.email') }}" method="post" >
                     {{csrf_field()}}
                   
  
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
                    
                       <div class="field row rowmembersbuttonsgroup buttons">
                          <div class="field is-grouped-right is-grouped">
                            
                             <p class="control">
                                <button type="submit" id="memberssubmit" class="button is-primary">Kirim Password Link</button>
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

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
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
