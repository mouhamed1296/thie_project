<?php
/*header('Content-Type: application/json');*/
    //chargement automatique des classes du modèle

    require_once (dirname(__FILE__).'/../includes/class_autoloader.inc.php');

    //Déclaration des variables pour les requêtes vers la base de données

    $stmt = new ShowInfos();
    $filter = new FilterInput();

   /*if(isset($_POST['submit']) && !empty($_POST['submit']) && $_POST['submit'] == 'search'):
        $search = getCleanInput($_POST['search']);
        $categ = getCleanInput($_POST['categ']);
        $rows = $stmt->getInfo("produit", ["categorie" => $categ]);
        $data = $rows;
        echo json_encode($data);
    endif;*/

    if(isset($_POST["query"])):
        $strSearch = $filter->getCleanInput($_POST['query']);
        $where = ["libelle" => $strSearch, "categorie" => $strSearch, "pu" => $strSearch, "fournisseur" => $strSearch];
        $rows = $stmt->getSearchInfo("produit", "libelle", $where, "LIKE");
        $nbRows = count($rows);
        if($nbRows > 0):
            foreach ($rows as $row):
                echo "<a href='#' class='list-group-item list-group-item-active border-1'>".$row['libelle']."</a>";
            endforeach;
        else:
            echo "<p class='p-2 mt-3 text-danger'>Aucun produit ne correspond à votre recherche</p>";
        endif;
    endif;
