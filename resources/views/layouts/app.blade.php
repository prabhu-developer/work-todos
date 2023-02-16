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

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.3.3/axios.min.js" integrity="sha512-wS6VWtjvRcylhyoArkahZUkzZFeKB7ch/MHukprGSh1XIidNvHG1rxPhyFnL73M0FC1YXPIXLRDAoOyRJNni/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        @stack('scripts')
        
        @if ($message = Session::get('success')) 
            <script>
                Alert('success',"{{ ucfirst($message) }}")
            </script>
        @endif 
    {{-- ======== /Scripts  ====== --}}
</body>

</html>
