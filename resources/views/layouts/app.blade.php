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

        {{-- ==== Breadcrumb ===== --}}
            @include('partials.breadcrumb')
        {{-- ==== /Breadcrumb ===== --}}

        {{-- ==== App Content root =====--}}
            @yield('content')
        {{-- ===== /App Content root ======--}}

    </main>

    {{-- ======== Scripts  ====== --}}

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

        @stack('scripts')

    {{-- ======== /Scripts  ====== --}}
</body>

</html>
