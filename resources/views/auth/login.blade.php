@extends('layouts.auth')

@section('auth_content')
    <div class="container">
        <div class="row g-0 min-vh-100 m-0">
            <div class="col-lg-6  d-flex align-items-center justify-content-center justify-content-lg-start">
                <div class="py-5">
                    <a href="/" class="brand text-dark">
                        {{ __('app.brand') }}
                    </a>
                    <h4 class="font-weight-normal text-dark mt-5">
                        Log in to your account
                    </h4>
                    <form class="w-300 w-lg-350 mt-4">
                        <div class="mb-3">
                            <input type="email" name="email" placeholder="Email" class="form-control form-control-lg bg-pastel-darkblue">
                        </div>

                        <div class="mb-3">
                            <input type="password" name="password" placeholder="Password" class="form-control form-control-lg bg-pastel-darkblue">
                        </div>
                        
                        <input type="submit" class="btn btn-primary btn-lg shadow-light text-uppercase-bold-sm hover-lift mt-4" value="Sign in">

                        <div class="text-secondary font-size-sm mt-5">
                            Don't have an account? <a href="{{ route('register') }}">Register</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <div class="login-bg bg-cover vw-lg-50 h-100">
                </div>
            </div>
        </div>
    </div>
@endsection
