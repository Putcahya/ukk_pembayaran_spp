@extends('layouts.app')

@section('content')
<body class="theme-blush">

    <div class="authentication">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-sm-12">
                    <form method="POST" action="{{ route('login') }}" class="card auth_form">
                        <div class="header">
                            <img class="logo my-2" src="{{ asset('/') }}images/logo.png" alt="">
                            <h4 >Pembayaran SPP</h4>
                            <h5>Log in</h5>
                        </div>
                        <div class="body">
                        @csrf
                        <div class="input-group mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Alamat Email">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                            </div>
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                            </div>
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4 float-right">
                                <button type="submit" class="btn btn-primary float-right">
                                    {{ __('Login') }}
                                </button>
                    
                                {{-- @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                            </div>
                        </div>
                        </div>
                    </form>
                    <div class="copyright text-center">
                        &copy;
                        <script>document.write(new Date().getFullYear())</script>,
                        <span>15520 Pembayaran SPP by <strong>_yoxsz</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Jquery Core Js -->
    <script src="assets/bundles/libscripts.bundle.js"></script>
    <script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
    </body>
@endsection
