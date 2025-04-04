<!DOCTYPE html>
<html>

<head>
    <title>Laravel 10.48.0 - CRUD User Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>
</head>

<body>
    <!-- <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;"> -->
        <div class="header">
            <div class="container">
                <nav class="mt-3">
                    <ul class="d-flex justify-content-center list-unstyled border border-dark py-3">
                        <li><a class="border-end border-start border-dark px-3 text-decoration-none text-dark" href="{{ url('/exe/exe1/index') }}">Home</a></li>
                    @guest
                        <li><a class="border-end border-dark px-3 text-decoration-none text-dark" href="{{ url('/exe/exe1/login') }}">Đăng nhập</a></li>
                        <li><a class="border-end border-dark px-3 text-decoration-none text-dark" href="{{ url('/exe/exe1/register') }}">Đăng ký</a></li>
                        @else
                    <li class="nav-item">
                        <a class="border-end border-dark px-3 text-decoration-none text-dark" href="{{ route('signout') }}">Đăng xuất</a>
                    </li>
                    @endguest
                    </ul>
                </nav>
            </div>
        </div>
    <!-- </nav> -->
     <main>

         @yield('content')
     </main>
    <div class="footer position-sticky bottom-0">
        <div class="container">
            <p class="text-center py-3 border border-dark">Copyright © 2025</p>
        </div>
    </div>
</body>

</html>