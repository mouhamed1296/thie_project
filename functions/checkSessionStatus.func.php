<?php
/**
 * Cette fonction permet de savoir si une session a été démarré ou non
 * @return bool
 */
    function checkSessionStatus():bool
    {
        if(php_sapi_name() !== 'cli'):
            if(version_compare(phpversion(), '5.4.0', '>=')):
                return session_status() === PHP_SESSION_ACTIVE ? true : false;
            else:
                return session_id() === '' ? false : true;
            endif;
        endif;
        return false;
    }
