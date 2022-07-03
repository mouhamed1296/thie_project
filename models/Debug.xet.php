<?php


class Debug
{
    public static function showArray(array $array)
    {
        if(is_array($array)):
            echo '<pre>';
            print_r($array);
            echo '<pre>';
        else:
            echo 'Vous avez passer un argument qui n\'est pas un tableau';
        endif;
    }
    public static function showArrayDump(array $array)
    {
        if(is_array($array)):
            echo '<pre>';
            var_dump($array);
            echo '<pre>';
        else:
            echo 'Vous avez passer un argument qui n\'est pas un tableau';
        endif;
    }
    public static function showObjectDump(object $objet)
    {
        if (is_object($objet)) :
            echo '<pre>';
            var_dump($objet);
            echo '<pre>';
        else :
            echo 'Vous avez passer un argument qui n\'est pas un objet';
        endif;
    }
}