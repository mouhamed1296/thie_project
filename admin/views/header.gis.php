<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <base href="/THIEO/admin/">
    <link rel="shortcut icon" href="../public/img/logo.png" type="image/x-icon">
    <title>ETHIC-SA</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="vendor/fontawesome5/css/all.min.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="vendor/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="vendor/css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <style>
        /*.customImage {*/
        /*    height: 200px;*/
        /*    object-fit: cover;*/
        /*    object-position: center center;*/
        /*}*/
    </style>
</head>

<body class="fixed-sn white-skin">

<!-- Main Navigation -->
<header>

    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav sn-bg-4 fixed">
        <ul class="custom-scrollbar">

            <!-- Logo -->
            <li class="logo-sn waves-effect py-3">
                <div class="text-center">
                    <a href="#" class="pl-0">
                        <img src="../public/img/logo.png" width="60" height="70" style="image-resolution: normal">
                    </a>
                </div>
            </li>

            <!-- Search Form -->
<!--            <li>-->
<!--                <form class="search-form" role="search">-->
<!--                    <div class="md-form mt-0 waves-light">-->
<!--                        <input type="text" class="form-control py-2" placeholder="chercher">-->
<!--                    </div>-->
<!--                </form>-->
<!--            </li>-->

            <!-- Side navigation links -->
            <li>
                <ul class="collapsible collapsible-accordion">

                    <li>
                        <a href="dashboard" class="waves-effect">
                            <i class="w-fa fas fa-tachometer-alt"></i>Tableau de bord
                        </a>
                    </li>
                    <li>
                        <a href="signup" class="waves-effect">
                            <i class="w-fa fas fa-user"></i>Ajouter un admin
                        </a>
                    </li>

                    <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="w-fa fas fa-list-alt"></i> Articles<i class="fas fa-angle-down rotate-icon"></i>
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="posts/add" class="waves-effect">Ajouter</a>
                                </li>
                                <li>
                                    <a href="posts/view" class="waves-effect">Voir</a>
                                </li>
                                <li>
                                    <a href="posts/edit" class="waves-effect">Modifier</a>
                                </li>
                                <li>
                                    <a href="posts/delete" class="waves-effect">Supprimer</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a class="collapsible-header waves-effect arrow-r">
                            <i class="w-fa fas fa-shopping-cart"></i>Produits<i class="fas fa-angle-down rotate-icon"></i>
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a href="product/add" class="waves-effect">Ajouter</a>
                                </li>
                                <li>
                                    <a href="product/view" class="waves-effect">Voir</a>
                                </li>
                                <li>
                                    <a href="product/edit" class="waves-effect">Modifier</a>
                                </li>
                                <li>
                                    <a href="product/delete" class="waves-effect">Supprimer</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="waves-effect">
                            <i class="w-fa fab fa-shopware"></i>Commandes
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Side navigation links -->

        </ul>
        <div class="sidenav-bg mask-strong"></div>
    </div>
    <!-- Sidebar navigation -->

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav">

        <!-- SideNav slide-out button -->
        <div class="float-left">
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
        </div>

        <!-- Breadcrumb -->
        <div class="breadcrumb-dn mr-auto">
            <p>Panneau d'administration</p>
        </div>

        <div class="d-flex change-mode">

<!--            <div class="ml-auto mb-0 mr-3 change-mode-wrapper">-->
<!--                <button class="btn btn-outline-black btn-sm" id="dark-mode">Changer de theme</button>-->
<!--            </div>-->

            <!-- Navbar links -->
            <ul class="nav navbar-nav nav-flex-icons ml-auto">

                <!-- Dropdown -->
                <li class="nav-item dropdown notifications-nav">
                    <a class="nav-link dropdown-toggle waves-effect" id="navbarDropdownMenuLink" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <span class="badge red">3</span> <i class="fas fa-bell"></i>
                        <span class="d-none d-md-inline-block">Notifications</span>
                    </a>
                    <div class="dropdown-menu dropdown-primary " aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">
                            <i class="far fa-money-bill-alt mr-2" aria-hidden="true"></i>
                            <span>New order received</span>
                            <span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 13 min</span>
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="far fa-money-bill-alt mr-2" aria-hidden="true"></i>
                            <span>New order received</span>
                            <span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 33 min</span>
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-chart-line mr-2" aria-hidden="true"></i>
                            <span>Your campaign is about to end</span>
                            <span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 53 min</span>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown notifications-nav">
                    <a class="nav-link dropdown-toggle waves-effect" id="Messages" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <span class="badge blue-gradient" id="mesNotify"></span>
                        <i class="fas fa-envelope"></i>
                        <span class="clearfix d-none d-sm-inline-block">Messages</span>
                    </a>
                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">
                            <i class="far fa-money-bill-alt mr-2" aria-hidden="true"></i>
                            <span>New Message</span>
                            <span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 13 min</span>
                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect"><i class="far fa-comments"></i> <span
                            class="clearfix d-none d-sm-inline-block">Support</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i> <span class="clearfix d-none d-sm-inline-block">Profil</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="controllers/logout.skt.php">
                            <i class="fas fa-unlock"></i> Se Déconnecter
                        </a>
                        <a class="dropdown-item" href="profile">
                            <i class="fas fa-user"></i> Mon compte
                        </a>
                    </div>
                </li>

            </ul>
            <!-- Navbar links -->

        </div>

    </nav>
    <!-- Navbar -->

    <!-- Fixed button -->
    <div class="fixed-action-btn clearfix d-none d-xl-block" style="bottom: 45px; right: 24px;">

        <a class="btn-floating btn-lg red">
            <i class="fas fa-pencil-alt"></i>
        </a>

        <ul class="list-unstyled">
            <li><a class="btn-floating red"><i class="fas fa-star"></i></a></li>
            <li><a class="btn-floating yellow darken-1"><i class="fas fa-user"></i></a></li>
            <li><a class="btn-floating green"><i class="fas fa-envelope"></i></a></li>
            <li><a class="btn-floating blue"><i class="fas fa-shopping-cart"></i></a></li>
        </ul>

    </div>
    <!-- Fixed button -->

</header>
<!-- Main Navigation -->
