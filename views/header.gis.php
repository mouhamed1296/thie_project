<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Mamadou Sarr">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="/THIEO/">

    <!--  CSS loaded from external librairies  -->

    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="vendor/fontawesome5/css/all.css">
    <link rel="stylesheet" href="vendor/mdb/css/mdb.min.css">

    <!--  Custom css means my own CSS file  -->

    <link rel="stylesheet" href="public/css/main.css">
    <style>
        .customImage {
            height: 150px;
            -o-object-fit: cover;
            object-fit: cover;
            -o-object-position: center center;
            object-position: center center;
        }

        @media (max-width: 992px) {
            .mobileMenu {
                -webkit-transform: translateX(-100%);
                transform: translateX(-100%);
                position: fixed;
                top: 0;
                bottom: 0;
                margin: auto;
                left: 0;
                -webkit-transition: all ease 0.25s;
                transition: all ease 0.25s;
            }

            .mobileMenu.open {
                -webkit-transform: translateX(-10%);
                transform: translateX(-10%);
            }

            .mobileMenu .navbar-nav {
                overflow-y: auto;
            }

            .hoverlay {
                position: fixed;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
                background-color: rgba(0, 0, 0, 0.5);
                display: none;
            }

            .hoverlay.open {
                display: block;
                z-index: 1029;
            }
        }
    </style>
    <!--   Logo && Title -->
    <link rel="shortcut icon" href="public/img/favicon.png" type="image/x-icon">
    <title>ETHIC-SA</title>
</head>

<body class="grey lighten-4">
    <main>

        <!--  sidenav start  -->

        <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-sm-start fixed-top p-2">
            <div class="container-fluid">
                <a class="navbar-brand order-1 order-lg-0 ml-lg-0 ml-2 mr-auto d-flex flex-row pb-0" href="acceuil">
                    <span class="d-flex flex-column mr-2">
                        <img src="public/img/favicon.png" width="30" height="30" alt="logo">
                        <strong class="span mb-0 pb-0" style="font-size: 0.4rem">ETHIC - SA</strong>
                    </span>
                    <h6>
                        ETHIC-SA
                        <p class="span mb-0 pb-0" style="font-size: 0.65rem">Tout en un clic</p>
                    </h6>
                </a>
                <button class="navbar-toggler align-self-start" type="button">
                    <span class="fas fa-bars toggleIcon"></span>
                </button>
                <span class="order-2 ml-lg-2 d-flex flex-row">
                    <!--<li class="dropdown mr-2" style="list-style: none">
                        <a class="dropdown-toggle waves-effect text-dark" href="#" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <?php //if (isset($_SESSION["username"])) : 
                            ?>
                                <a class="dropdown-item" href="user/home">
                                    <i class="fas fa-home"></i> Mon compte
                                </a>
                            <?php// else : ?>

                                <a class="dropdown-item" href="connexion">
                                    <i class="fas fa-unlock"></i> Se Connecter
                                </a>
                                <a class="dropdown-item" href="inscription">
                                    <i class="fas fa-user"></i> S'Inscrire
                                </a>
                            <?php// endif; ?>
                        </div>
                    </li>
                    <!--                <a href=""></a>-->
                    <!--                <i class="fas fa-user mr-2"></i>-->
                    <a href="panier">
                        <i class="fas fa-shopping-cart text-dark"></i>
                        <sup class="badge badge-danger badge-hot" id="cart-item"></sup>
                    </a>
                </span>

                <div class="collapse navbar-collapse bg-light p-3 pl-5 pl-lg-0 p-lg-0 mt-5 mt-lg-0 d-flex flex-column flex-lg-row flex-xl-row justify-content-lg-end mobileMenu" id="navbarSupportedContent">
                    <ul class="navbar-nav align-self-stretch">
                        <li class="nav-item <?= (isset($_GET['page']) && $_GET['page'] === 'acceuil') ? "active" : "" ?>">
                            <a class="nav-link d-lg-flex flex-lg-row" href="acceuil">
                                <i class='fas fa-home' style='margin-right: 4px;'></i>ACCEUIL
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item <?= (isset($_GET['page']) && $_GET['page'] === 'about') ? "active" : "" ?>">
                            <a class="nav-link d-lg-flex flex-lg-row" href="about">
                                <i class='fas fa-user' style='margin-right: 4px;'></i>A Propos
                            </a>
                        </li>
                        <li class="nav-item dropdown <?= (isset($_GET['page']) && ($_GET['page'] === 'services' || $_GET['page'] === 'panier')) ? "active" : "" ?>">
                            <!--<a class="nav-link d-lg-flex flex-lg-row" href="services">
                                <i class='fas fa-hand-holding-usd' style='margin-right: 4px;'></i>SERVICES
                            </a>-->
                            <a class="nav-link dropdown-toggle" href="#" id="services" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class='fas fa-hand-holding-usd' style='margin-right: 4px;'></i>Services
                            </a>
                            <div class="dropdown-menu" aria-labelledby="services">
                                <a class="dropdown-item" href="services/materiaux">Matériaux de construction</a>
                                <a class="dropdown-item" href="services/maconnerie">Maconnerie</a>
                                <a class="dropdown-item" href="services/plomberie">Plomberie</a>
                                <a class="dropdown-item" href="services/electrique">Electrique</a>
                                <a class="dropdown-item" href="services/decoration">Décoration</a>
                                <a class="dropdown-item" href="services/location">Location matériel</a>
                                <a class="dropdown-item" href="services">Autres</a>
                            </div>
                        </li>
                        <li class="nav-item <?= (isset($_GET['page']) && $_GET['page'] === 'contact') ? "active" : "" ?>">
                            <a class="nav-link d-lg-flex flex-lg-row" href="contact">
                                <i class='fas fa-address-card' style='margin-right: 4px;'></i>CONTACT
                            </a>
                        </li>
                    </ul>
                    <form class="form-inline my-2 ml-2 my-lg-0 align-self-stretch d-lg-flex flex-lg-row">
                        <input class="form-control mr-sm-2" id="query" type="search" placeholder="Search" aria-label="Search" autocomplete="off">
                        <button class="btn btn-sm btn-primary my-2 my-sm-0" type="submit" name="search"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </nav>

        <!--  sidenav end  -->
        <!--  overlay start -->

        <div class="hoverlay"></div>

        <!--  overlay end  -->

        <!--""""""""""""""""""
    """"""""""""""""""""""
      Main content start
    """"""""""""""""""""""
    """"""""""""""""""""""-->

        <div class="container py-4 my-5">