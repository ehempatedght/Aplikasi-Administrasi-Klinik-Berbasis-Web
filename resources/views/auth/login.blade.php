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
            
            <a href="{{url('/login')}}" class="logo">
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
@endsection
