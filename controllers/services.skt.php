<?php
/*chargement des classes necessaire pour la communication
 avec la base de données et des classes de filtrages des données*/

    require_once (dirname(__FILE__).'/../includes/class_autoloader.inc.php');

//initialisation des classes

    $filter = new FilterInput();
    $stmt = new ShowInfos();

//Génération d'un code panier unique et stockage dans une variable de session

    $n = rand(100, 999);
    if(!isset($_SESSION['cart_code'])):
        $_SESSION['cart_code'] = 'cp'.rand(2*$n, (100*$n) +1);
    else:
        $_SESSION['cart_code'] .= '';
    endif;

//Chargement du slider et du compteur de produit dans le panier

    Import::import("../views/slider.gis.php", "include"); 

//Chargement des nouveaux produits

    $news = $stmt->getInfo("produit", [], 'AND', 'pid', 'DESC', 9);
    
//la vue incluse si on veut voir un seul produit

    if (isset($_GET['item']) && !empty($_GET['item']) && $_GET['item'] > 0):
        $id = $filter->getCleanInput($_GET['item']);
        $rows = $stmt->getInfo("produit", ['pid' => $id]);
        $sameCateg = $stmt->getInfo("produit", ['categorie' => $rows[0]['categorie']], 'AND', 'pid', 'DESC', 4);
        foreach ($rows as $row):
            Import::import("../views/item.gis.php", "include_once", ["news" => $news, "row" => $row, "sameCateg" => $sameCateg]);
        endforeach;

//la vue incluse si on veut voir plusieurs produits

    elseif (isset($_GET["sub_page"])):
        $sub_page = $filter->getCleanInput($_GET["sub_page"]);
        switch ($sub_page):
            case "fer":
                Import::import("../views/fer.gis.php");
                break;
            case "ciment":
                Import::import("../views/ciment.gis.php");
                break;
            default:
                
        endswitch;
    else:
        Import::import("../views/services.gis.php",
            "include",
            ["news" => $news]
        ); 
    endif;