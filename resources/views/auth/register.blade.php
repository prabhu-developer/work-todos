@extends('layouts.auth')

@section('auth_content')
    <div class="row g-0 min-vh-100">
        <div class="col-lg-6 d-none d-lg-block">
            <div class="bg-cover h-100 register-bg bg-dark"></div>
        </div>
        <div class="col-lg-6 d-flex align-items-center justify-content-center justify-content-lg-start">
            <div class="py-5 ps-lg-8">
                <a href="/" class="brand text-dark">
                    {{ __('app.brand') }}
                </a>
                <h4 class="font-weight-normal text-dark mt-5">
                    Create your account
                </h4>
                <form class="w-100 mt-4" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="name" placeholder="Your name" class="form-control form-control-lg bg-pastel-darkblue" value="{{ old('name') }}" required>
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="email" name="email" placeholder="Email" class="form-control form-control-lg bg-pastel-darkblue" value="{{ old('email') }}" required>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="password" name="password" placeholder="Password" class="form-control form-control-lg bg-pastel-darkblue"  required>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <input type="password" name="confirm_password" placeholder="Re-Enter your Password" class="form-control form-control-lg bg-pastel-darkblue"  required>
                        @error('confirm_password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3 text-left">
                        <div class="form-check font-size-sm text-secondary mt-4">
                            <input type="checkbox" class="form-check-input" id="customCheck1">
                            <label class="form-check-label" for="customCheck1">
                                I've read &amp; agree with <a href="#">the terms</a>.
                            </label>
                        </div>
                    </div>

                    <input type="submit" class="btn btn-primary btn-lg shadow-lg text-uppercase-bold-sm hover-lift mt-4"
                        value="Create account">

                    <div class="text-secondary font-size-sm mt-5">
                        Already have an account?
                        <a href="{{ route('login') }}">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
