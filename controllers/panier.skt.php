<?php
    require_once (dirname(__FILE__).'/../includes/class_autoloader.inc.php');
    $cart = new Cart();
    $filter = new FilterInput();
    $errors = [
        'empty_fields' => 'Veuillez remplir les champs!!!',
        'empty_firstname' => 'Veuillez saisir votre prénom!!!',
        'empty_tel' => 'Veuillez saisir votre numero de Telephone!!!',
        'empty_lastname' => 'Veuillez saisir votre nom!!!',
        'empty_add' => 'Veuillez saisir votre adresse',
        'empty_ship_add' => 'Veuillez saisir votre adresse de livraison',
        'empty_depart_ville' => 'Veuillez choisir votre ville ou departement',
        'empty_city' => 'Veuillez Choisir votre region',
        'empty_cart' => 'Veuillez remplir votre panier de produits!!',
        'none' => 'Votre commande a bien été recue, elle sera traité dans les meilleures délais'
    ];
    if(isset($_GET['error'])):
        $error = $filter->getCleanInput($_GET['error']);
        $message = $errors["$error"];
    endif;
    if (isset($_SESSION['cart_item'])):
        $results = $_SESSION['cart_item'];
    endif;
    include (dirname(__FILE__).'/../views/panier.gis.php');
