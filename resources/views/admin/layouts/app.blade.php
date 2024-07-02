<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

</head>

<body>
    <div class="">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            {{-- <ion-icon name="logo-apple"></ion-icon> --}}
                        </span>
                        <span class="title">@yield('titre-page', 'Admin')</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.evenements') ? 'active' : '' }}">
                    <a href="{{ route('admin.evenements') }}">
                        <span class="icon">
                            <ion-icon name="book-outline"></ion-icon>
                        </span>
                        <span class="title">Evenements</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.association') ? 'active' : '' }}">
                    <a href="{{ route('admin.association') }}">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Associations</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.utilisateurs') ? 'active' : '' }}">
                    <a href="{{ route('admin.utilisateurs') }}">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Utilisateurs</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.roles.create') ? 'active' : '' }}">
                    <a href="{{ route('admin.roles.create') }}">
                        <span class="icon">
                            <ion-icon name="add-outline"></ion-icon>
                        </span>
                        <span class="title">Create Role</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Deconnexion</span>
                    </a>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                {{-- <div class="user">
                    <img src="{{ asset('assets/imgs/customer01.jpg') }}" alt="">
                </div> --}}
            </div>
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">05</div>
                        <div class="cardName">Evenements</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">100</div>
                        <div class="cardName">Associations</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">12000</div>
                        <div class="cardName">Utilisateurs</div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- Ici doit s'afficher les tous les cruds -->
            <div class="content">
                @yield('content')
            </div>

        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="{{ asset('js/admin.js') }}"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
