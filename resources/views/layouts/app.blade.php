<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Work to-do</title>

    {{-- ====== Styles ===== --}}
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        @stack('styles')
    {{-- ====== /Styles ===== --}}
</head>

<body>

    {{-- ====== Header ==== --}}
        @include('partials.header')
    {{-- ====== /Header ==== --}}

    <main class="container">

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible shadow-sm fade show" role="alert">
                <strong>{{ ucfirst($message) }}</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif 

        {{-- ==== Breadcrumb ===== --}}
            @include('partials.breadcrumb')
        {{-- ==== /Breadcrumb ===== --}}

        {{-- ==== App Content root =====--}}
            @yield('content')
        {{-- ===== /App Content root ======--}}

    </main>

    {{-- ======== Scripts  ====== --}}

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

        @stack('scripts')

    {{-- ======== /Scripts  ====== --}}
</body>

</html>
