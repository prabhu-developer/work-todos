<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>{{ __('app.brand') }} | Home</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>body { text-shadow: 0 .05rem .1rem rgba(0, 0, 0, .5); box-shadow: inset 0 0 5rem rgba(0, 0, 0, .5);}</style>
</head>

<body class="d-flex h-100 text-center text-white brand-bg">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="mb-auto pt-4">
            <div>
                <h3 class="text-center brand">{{ __('app.brand') }}</h3>
            </div>
        </header>
        <main class="px-3">
            <h1>Welcome to work to-do app.</h1>
            <p class="lead">Track your daily basic tasks via work to-do application. let's start your day with us.</p>
            <p class="lead"> 
                <a href="{{ route('login') }}" class="btn btn-lg btn-outline-light fw-bold">Sign In</a>
                <a href="{{ route('register') }}" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Sign Up</a>
            </p>
        </main>
        <footer class="mt-auto text-white-50">
            <p>Developed By <a href="https://github.com/prabhu-developer//" class="text-white">Prabhu.coder</a></p>
        </footer>
    </div>
</body>

</html>
