<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>@yield('title', 'Tableau de board association')</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            {{-- <ion-icon name="logo-apple"></ion-icon> --}}
                        </span>
                        <span class="title">@yield('titre-page', 'organisme')</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('organisme.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('organisme.dashboard') }}">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('organisme.evenements') ? 'active' : '' }}">
                    <a href="{{ route('organisme.evenements') }}">
                        <span class="icon">
                            <ion-icon name="book-outline"></ion-icon>
                        </span>
                        <span class="title">Evenements</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('organisme.utilisateurs') ? 'active' : '' }}">
                    @isset($evenement)
                        <a href="{{ route('organisme.inscrit', ['evenementId' => $evenement->id]) }}">
                            <span class="icon">
                                <ion-icon name="people-outline"></ion-icon>
                            </span>
                            <span class="title">Utilisateurs</span>
                        </a>
                    @endisset
                </li>
                <li>
                    <a href="{{ route('organisme.logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Deconnexion</span>
                    </a>
                    <form id="logout-form" action="{{ route('organisme.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                {{-- <div class="user">
                    <img src="assets/imgs/customer01.jpg" alt="">
                </div> --}}
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox mt-13">
                @yield('cardBox')
            </div>
            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- ================ Order Details List ================= -->

    <!-- Ici doit s'afficher les tous les cruds -->

    <!-- =========== Scripts =========  -->
    <script src="{{asset('js/admin.js')}}"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
