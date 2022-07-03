<?php
try {
    //on demarre la session
    session_start();
    //on appelle le script de connexion
    if (isset($_GET['page']) && ($_GET['page'] != 'usersignup' && $_GET['page'] != 'userlogin' && !preg_match("#^user[a-z]+$#", $_GET['page']))):
        include 'views/header.gis.php';
    endif;
    if (!empty($_GET['page']) && preg_match("/^[a-z]*$/", $_GET['page']) && is_file('controllers/'.$_GET['page'].'.skt.php'))
    {
    
        include 'controllers/'.$_GET['page'].'.skt.php';
    }
    else
    {
        include 'controllers/acceuil.skt.php';
    }
    if (isset($_GET['page']) && ($_GET['page'] != 'usersignup' && $_GET['page'] != 'userlogin')):
        include 'views/footer.gis.php';
    endif;
} catch (Exception $e) {
    $e->getMessage();
}
