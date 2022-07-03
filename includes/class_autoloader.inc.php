<?php
    spl_autoload_register('modelsAutoLoader');

    function modelsAutoLoader($className)
    {
        $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        if (strpos($url, 'admin/controllers') !== false)
        {
            $path = '../../models/';
        }
        elseif(strpos($url, 'includes') !== false || strpos($url, 'controllers') !== false || strpos($url, 'admin') !== false)
        {
            $path = '../models/';
        }
        else
        {
            $path = 'models/';
        }
        $extension = '.xet.php';
        $fullpath = $path.$className.$extension;

        require_once $fullpath;
    }
