<?php
    if (isset($_SESSION['uname'])):
        include dirname(__FILE__).'/../views/dashboard.gis.php';
    else:
        header('location: login');
    endif;
