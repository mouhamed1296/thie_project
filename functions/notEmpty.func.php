<?php
    /**
     * Cette fonction permet de vérifier si une variable est nul ou non
     * elle permet aussi de vérifier que tous les éléments d'un tableau donné sont non nuls
     *
     * @param string|int|float|array  $var 
     * @return boolean true or false en fonction du résultat du test
     */
    function notEmpty($var):bool
    {
        $not_empty_status = true;
        if (is_string($var) || is_int($var) || is_float($var)) :
            if (!empty($var)) :
                $not_empty_status = true;
            else:
                $not_empty_status = false;
            endif;
        elseif(is_array($var)):
            $cpt = 0;
            $n = count($var);
            foreach ($var as $key => $value) :
                if (!empty($var["$key"]) && $var["$key"] === $value) :
                    $cpt++;
                    break;
                endif;
            endforeach;
            if ($cpt === $n) :
                $not_empty_status = true;
            else:
                $not_empty_status = false;
            endif;
        else:
            $not_empty_status = false; 
            echo "unknown Type";
        endif;
        return $not_empty_status;
    }