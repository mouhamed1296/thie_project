<?php
    function explodeAssoc(string $delimiter, string $string, array $assocKeys):array
    {
        $explodedArray = [];
        $assoc = $assocKeys;
        $array = explode($delimiter, $string);
        $i=0;
        $n= count($array);
        $k= count($assocKeys);
        if ($n === $k):
            while($i < $k):
                $explodedArray[$assoc["$i"]] = $array["$i"];
                $i++;
            endwhile;
        else:
            echo "Too or few Keys for the array";
        endif;
        
        return $explodedArray;
    }