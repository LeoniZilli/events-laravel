<!DOCTYPE html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSS da aplicação -->
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="shortcut icon" href="/assets/image/pngegg.png" type="image/x-icon">

    <!-- CDN include icon bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <!-- CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <title>@yield('title')</title>

</head>

<body>
    <header class="p-3 bg-dark text-white navbar-default fixed-top">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <img src="/assets/image/pngegg.png" alt="" width="40" height="40">
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="/" class="nav-link px-2 text-white ms-4">Events</a></li>
                    <li><a href="/event/create" class="nav-link px-2 text-white">Create events</a></li>
{{--                    <li><a href="/contact" class="nav-link px-2 text-white">Contact</a></li>--}}

                    @auth
                    <li><a href="/dashboard" class="nav-link px-2 text-white">My Events</a></li>
                    @endauth

                </ul>
                <div class="text-end">
                    @guest
                    <a href="/login"><button type="button" class="btn btn-outline-light btn-sm me-2">Login</button></a>
                    <a href="/register"><button type="button" class="btn btn-outline-light btn-sm me-2">Register</button></a>
                    @endguest
                    @auth

                    <form action="/logout" method="POST">
                        @csrf
                        <a href="/logout" onclick="event.preventDefault();
                        this.closest('form').submit();">
                            <button type="button" class="btn btn-danger btn-sm me-2">
                                Logout

                            </button>
                        </a>
                    </form>

                    @endauth

                </div>
            </div>
        </div>
    </header>
    <main role="main">
        @yield('content')
    </main>

    <footer class="d-flex bg-dark text-white">
        <p>
            Laravel Project &copy; 2022
        </p>
    </footer>

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <!-- JavaScript da Aplicação -->
    <script src="/assets/js/script.js"></script>

    <!-- JavaScript do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- AJAX -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>

</body>

</html>
