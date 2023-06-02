<!doctype html>
<html lang="en">

<head>
    {{-- <base href="/"> --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <section class="dash_nav">
        <nav class="navbar dash-nav bg-dark navbar-dark text-white">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="{{route('admin.dash')}}">Donations</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header bg-dark text-white">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Dashboard</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body bg-dark text-white">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('AdminProject')}}"> Projects</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('AdminEvent')}}">Events</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/image') }}">Images</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/team')}}">Team</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/comment') }}">Comments</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="/profile">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-responsive-nav-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-responsive-nav-link>
                                    </form>
                                </a>
                            </li>



                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </section>
    <!-- <div id="preloader">
       
       </div>
      <div class="up-icon">
        <i class="bi bi-arrow-up" id="top-btn"></i>
    </div> -->

    <section class="dash-main  py-5 ">
        <div class="container-fluid">

            <div class="row px-5">

                <div class="col-3 bg-dark text-white py-5 dash-one ">


                    <h4 class="text-white text-center py-3 dash-head "><a class="text-decoration-none text-white" href="{{route('admin.dash')}}">Dashboard</a></h4>
                    <hr>
                    <div class="dash-link">
                        <a href="{{ url('/') }}">Home</a>
                        <a href="{{route('AdminProject')}}"> Projcets</a>
                        <a href="{{route('AdminEvent')}}"> Events</a>
                        <a href="{{ url('/image') }}"> Images</a>
                        <a href="{{route('Team')}}">Team</a>
                        <a href="{{ url('/comment') }}">Comments</a>
                        <a href="/profile">Profile</a>
                        <a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>
                        </a>

                    </div>

                </div>

                @yield('content')





            </div>
        </div>
    </section>


    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    {{-- keeping page same position --}}
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script> --}}
</body>

</html>
