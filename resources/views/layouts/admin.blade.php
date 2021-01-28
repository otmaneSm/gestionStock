<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN-DASHBOARD</title>
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('assets/css/perfect-scrollbar.css')}}">
        @notifyCss
</head>

<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <img src="assets/images/logo.svg" alt="" srcset="">
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">


                        <li class='sidebar-title'>PARAMETRE PRODUITS</li>
                        <li class="sidebar-item {{ (\Request::route()->getName() == 'mes_produits') ? 'active' : '' }} ">
                            <a href="{{ route('mes_produits') }}" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Tout les produits</span>
                            </a>

                        </li>
                        <li class="sidebar-item  {{ (\Request::route()->getName() == 'nouveau_produit') ? 'active' : '' }} ">
                            <a href="{{ route('nouveau_produit') }}" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Nouveau produit</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ (\Request::route()->getName() == 'nouvelleArrivage') ? 'active' : '' }}   ">
                            <a href="{{ route('nouvelleArrivage') }} " class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Nouvelle quantité</span>
                            </a>
                        </li>
                        {{-- <li class="sidebar-item {{ (\Request::route()->getName() == 'produitRenouveler') ? 'active' : '' }}  ">
                            <a href="{{ route('produitRenouveler') }}" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Les porduits à renouveler</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ (\Request::route()->getName() == 'produitManquant') ? 'active' : '' }} ">
                            <a href="{{ route('produitManquant') }}" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Les porduits manquants</span>
                            </a>
                        </li> --}}
                        <li class="sidebar-item {{ (\Request::route()->getName() == 'produitEdit') ? 'active' : '' }} ">
                            <a href="{{ route('produitEdit') }}" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Editer Produits</span>
                            </a>
                        </li>













                        <li class='sidebar-title'>FACTURES</li>








                        <li class="sidebar-item {{ (\Request::route()->getName() == 'mes_factures') ? 'active' : '' }}  ">
                            <a href="{{ route('mes_factures') }}" class='sidebar-link'>
                                <i data-feather="layout" width="20"></i>
                                <span>Mes Factures</span>
                            </a>

                        </li>




                        <li class="sidebar-item  {{ (\Request::route()->getName() == 'nouvelle_facture') ? 'active' : '' }} ">
                            <a href="{{ route('nouvelle_facture') }}" class='sidebar-link'>
                                <i data-feather="layers" width="20"></i>
                                <span>Nouvelle Facture</span>
                            </a>

                        </li>




                        <li class="sidebar-item  {{ (\Request::route()->getName() == 'editer_factures') ? 'active' : '' }}  ">
                            <a href="{{ route('editer_factures') }}" class='sidebar-link'>
                                <i data-feather="grid" width="20"></i>
                                <span>editer Facture</span>
                            </a>
                        </li>
                        <li class='sidebar-title'>Bons & PRODUIT SORTANT</li>

                        <li class="sidebar-item  {{ (\Request::route()->getName() == 'nouveau_bons') ? 'active' : '' }}    ">
                            <a href="{{ route('nouveau_bons') }}" class='sidebar-link'>
                                <i data-feather="grid" width="20"></i>
                                <span>Nouveau Bon</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ (\Request::route()->getName() == 'editer_bons') ? 'active' : '' }}   ">
                            <a href="{{ route('editer_bons') }}" class='sidebar-link'>
                                <i data-feather="grid" width="20"></i>
                                <span>editer Bon</span>
                            </a>
                        </li>
                        <li class="sidebar-item {{ (\Request::route()->getName() == 'mes_bons') ? 'active' : '' }}  ">
                            <a href="{{ route('mes_bons') }}" class='sidebar-link'>
                                <i data-feather="grid" width="20"></i>
                                <span>Mes Bons</span>
                            </a>
                        </li>

                        <li class='sidebar-title'>UTILISATEUR</li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light"
                style="box-shadow: 0px 5px 25px 0px rgba(0,0,0,0.75);">
               <span class="navbar-toggler-icon sidebar-toggler" style="cursor: pointer"></span>
                <button class="btn navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ml-auto">
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar mr-1">
                                    <img src="https://www.shareicon.net/data/512x512/2017/01/06/868320_people_512x512.png"
                                        id="test" alt="" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">{{ Auth::user()->name }}</div>

                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="dropdown-item">logout</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="main-content container-fluid">
                @yield('content')
            </div>

            <script src="{{asset('assets/js/perfect-scrollbar.min.js')}}"></script>
            <script src="{{ asset('assets/js/main.js') }}"></script>
            <script src="{{ asset('assets/js/app.js') }}"></script>
            <script src="https://use.fontawesome.com/f30aa9d23b.js"></script>
            <!-- JavaScript Bundle with Popper -->


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
            <script
			  src="https://code.jquery.com/jquery-2.2.4.js"
			  integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
              crossorigin="anonymous"></script>
              <script src="{{ asset('assets/js/notify.js') }}"></script>

<x:notify-messages />

@yield('script')

@notifyJs
</body>

</html>
