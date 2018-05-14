@extends('layouts.app')

@section('content')

<body class="page-body login-page login-form-fall" data-url="http://neon.dev">


<!-- This is needed when you send requests via Ajax -->
<script type="text/javascript">
var baseurl = '';
</script>
<div class="login-container">
    
    <div class="login-header login-caret">
        
        <div class="login-content">
            
            <a href="index.html" class="logo">
                <img src="images/logo.jpeg" width="240" alt="" />
            </a>
            
            <p class="description" style="color: #fefefe; font-size: 14px;">Selamat Datang, Silahkan Masukan Username dan Password.</p>
            
            <!-- progress bar indicator -->
           
        </div>
        
</div>

<div class="login-form">
    <div class="login-content">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="entypo-user"></i>
                    </div>

                    <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="username" required autofocus>
                </div>
            </div>
            @if ($errors->has('email'))
                <br>
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="entypo-key"></i>
                    </div>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" />
                </div>
            </div>
            @if ($errors->has('password'))
                <br><span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-login">
                    <i class="entypo-login"></i> Login In
                </button>
            </div> 
        </form>
    </div>
</div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
