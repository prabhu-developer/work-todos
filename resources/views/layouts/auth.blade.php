<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Work to-do </title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <main>
        <div class="container">
            <div class="row g-0 min-vh-100 m-0">
                <div class="col-lg-6  d-flex align-items-center justify-content-center justify-content-lg-start">
                    @yield('auth_content')
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="login-bg bg-cover vw-lg-50 h-100">
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
