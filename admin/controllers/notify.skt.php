<?php
    include_once dirname(__FILE__).'/../../includes/class_autoloader.inc.php';

    $select = new ShowInfos();
    $filter = new FilterInput();
    if(isset($_GET['notify']) && $_GET['notify'] === 'notify'):
        $rows = $select->getInfo("contact");
        $items = 0;
        foreach ($rows as $row):
            $items++;
        endforeach;
        echo isset($items) ? $items : '';
    endif;
    if(isset($_GET['sales']) && $_GET['sales'] === 'sales'):
        $rows = $select->getInfo("commande");
        $sales = 0;
        foreach ($rows as $row):
            $row["total_commande"] = str_replace(",", "", $row["total_commande"]);
            $sales += $row["total_commande"];
        endforeach;
        echo isset($sales) ? $sales : '';
    endif;