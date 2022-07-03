<?php

try {
    //on demarre la session
    session_start();
    if(isset($_GET['page']) && $_GET['page'] != 'login' && $_GET['page'] != 'signup' && isset($_SESSION['uname'])):
        include 'views/header.gis.php';
    endif;
    //on appelle le script de connexion
    if (!empty($_GET['page']) && preg_match("/^[a-z]*$/", $_GET['page']) && is_file('controllers/' . $_GET['page'] . '.skt.php')) {

        include 'controllers/' . $_GET['page'] . '.skt.php';
    } else {
        include 'controllers/login.skt.php';
    }
    if(isset($_GET['page']) && $_GET['page'] != 'login' && $_GET['page'] != 'signup' && isset($_SESSION['uname'])):
        include 'views/footer.gis.php';
    endif;
} catch (Exception $e) {
    $e->getMessage();
}
