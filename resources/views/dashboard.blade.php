@extends('layouts.app')

@section('content')
    <header class="p-3 mb-3 border-bottom">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="brand brand-sm d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                    {{ __('app.brand') }}
                </a>

                <ul class="nav col-12 col-lg-auto mx-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-2 link-secondary">Dashboard</a></li>
                    <li><a href="#" class="nav-link px-2 link-dark">My Todo's</a></li>
                    <li><a href="#" class="nav-link px-2 link-dark">Create Todo</a></li>
                </ul>

                <div class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    <a href="" class="text-dark btn btn-sm rounded-pill bg-light">
                        <i class="bi bi-search"></i>
                    </a>
                </div>

                <div class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://avatars.githubusercontent.com/u/98683?v=1" alt="mdo" width="32" height="32"
                            class="rounded-circle">
                        Prabhu.k
                    </a>
                    <ul class="dropdown-menu text-small" style="">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
@endsection
