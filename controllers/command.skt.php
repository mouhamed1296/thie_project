<?php
    //starting session
    session_start();

    //chargement automatique des classes du modèle

    require_once (dirname(__FILE__).'/../includes/class_autoloader.inc.php');
    
    //Importation de la fonction explodeAssoc

    Import::import("../functions/explodeAssoc.func.php");

    //Déclaration des variables pour les requêtes vers la base de données et le filtrage des données

    $stmt = new ShowInfos();
    $insert = new AddInfos();
    $filter = new FilterInput();
    $cart = new Cart();
    $timezone = new DateTimeZone('Africa/Dakar');
    $date = new DateSn();


    //script de récupération des produits de la base de donnée

    if(isset($_GET['produits']) && $_GET['produits'] =="produits"):
        $rows = $stmt->getInfo("produit", [], 'AND', 'pid', 'ASC', 8, 0);
        foreach ($rows as $row):
            include (dirname(__FILE__).'/../views/product.gis.php');
            Import::import ('../views/product.gis.php', 'include_once', ["row" => $row]); 
        endforeach;
    endif;

    //Traitement de commande rapide de ciment et de fer

    if (isset($_POST["buy_ciment"])):
        if (!empty($_POST["type_ciment"]) && !empty($_POST["qte_ciment"])):
            $type = $filter->getCleanInput($_POST["type_ciment"]);
            $qte = $filter->getCleanInput($_POST["qte_ciment"]);
            $values = ["type" => $type, "quantite" => $qte];
            $insert->addInfo("commande_rapide", $values);
        else:
            if (empty($_POST["type_ciment"])):
                Locate::To("../services/ciment/empty_type");
            elseif (empty($_POST["qte_ciment"])):
                Locate::To("../services/ciment/empty_qte");
            endif;
        endif;
    elseif (isset($_POST["buy_fer"])):
        if (!empty($_POST["type_fer"]) && !empty($_POST["qte_fer"])):
            $type = $filter->getCleanInput($_POST["type_fer"]);
            $qte = $filter->getCleanInput($_POST["qte_fer"]);
            $values = ["type" => $type, "quantite" => $qte];
            $insert->addInfo("commande_rapide", $values);
        else:
            if (empty($_POST["type_fer"])):
                Locate::To("../services/fer/empty_type");
            elseif (empty($_POST["qte_fer"])):
                Locate::To("../services/fer/empty_qte");
            endif;
        endif;
    endif;

    //Ajout d'un produit dans le panier

    if(isset($_POST['pid'])){
        $pid = $filter->getCleanInput($_POST['pid']);
        $plib = $filter->getCleanInput($_POST['plib']);
        $ppu = $filter->getCleanInput($_POST['ppu']);
        $pimage = $filter->getCleanInput($_POST['pimage']);
        $pcode = $filter->getCleanInput($_POST['pcode']);
        $pcateg = $filter->getCleanInput($_POST['pcateg']);
        $cart_code = $_SESSION['cart_code'];
        if(isset($_POST['pqte'])):
            $pqte = $filter->getCleanInput($_POST["pqte"]);
        else:
        $pqte = 1;
        endif;
        $ptotal = $ppu * $pqte;

        if(!isset($_SESSION['cart_item'][$pid])){
            $cart->addToCart($pid, $cart_code, $plib, $ppu, $pimage, $pqte, $ptotal, $pcode, $pcateg);
            $error= false;
            $message = 'Produit ajouté au panier';
            Import::import ('../views/alert.gis.php','include_once', ["error" => $error, "message" => $message]);
        }
        else
        {
            $error= true;
            $message = 'Produit dêjà ajouté au panier: pour choisir la 
                        quantité veuillez ouvrir le panier
                        en cliquant sur l\'icône panier.';
            Import::import ('../views/alert.gis.php','include_once', ["error" => $error, "message" => $message]);
        }
    }

    //chargement du nombre de produits qui sont dans le panier

    if (isset($_GET["cartItem"]) && isset($_GET["cartItem"]) == "cart_item") :
       $items = $cart->cartSessionItemCount;
       echo ($items > 0) ? $items : null;
    endif;

    //Supprimer un produit du panier

    if(isset($_POST["id"]) && !empty($_POST["id"]) && $_POST["id"] > 0):
        $items = $cart->cartSessionItemCount;
        if($items > 0):
            $cart->removeFromCart();
            $error= false;
            $message = 'Produit supprimer de votre panier avec succés';
            Import::import ('../views/alert.gis.php','include_once', ["error" => $error, "message" => $message]);
        else:
            $error= true;
            $message = 'Une erreur s\'est produite lors de la supression veuillez réessayer!!';
            Import::import ('../views/alert.gis.php','include_once', ["error" => $error, "message" => $message]);
        endif;
    endif;

    //Supprimer tous les produit du panier

    if(isset($_GET["clear"]) && !empty($_GET["clear"]) && $_GET["clear"] == $_SESSION["cart_code"]):
        $items = $cart->cartSessionItemCount;
        if($items > 0):
            $cart->emptyCart();
            $_SESSION['showAlert'] = "block";
            $_SESSION['message'] = 'Votre panier a été vider avec succés!!Aller à l\'onglet produit pour de nouveaux achat';
            Locate::To("../panier");
        else:
            $_SESSION['showAlert'] = "block";
            $_SESSION['message'] = 'Une erreur s\'est produite lors de la supression veuillez réessayer!!';
            Locate::To("../panier");
        endif;
    endif;

    //Modifier la quantité d'un produit du panier

    if(isset($_POST['qty']) && isset($_POST['prodid']) && !empty($_POST['qty']) && $_POST['qty'] > 0):
        $cart->editCart();
    endif;

    //Validation de la commande et création automatique du compte client

    if(isset($_POST['confirm'])):
        if(isset($_SESSION['cart_item'])):
            if(!empty($_POST['firstname']) || !empty($_POST['lastname']) || !empty($_POST['tel']) || !empty($_POST['adresse']) || !empty($_POST['addliv']) || !empty($_POST['region']) || !empty($_POST['depart_ville'])):
                if(!empty($_POST['firstname'])):
                    if (!empty($_POST['lastname'])):
                        if(!empty($_POST['tel'])):
                            if (!empty($_POST['adresse'])):
                                if (!empty($_POST['addliv'])):
                                    if (!empty($_POST['region'])):
                                        if (!empty($_POST['depart_ville'])):
                                            $firstname = $filter->getCleanInput($_POST['firstname']);
                                            $lastname = $filter->getCleanInput($_POST['lastname']);
                                            $tel= $filter->getCleanInput($_POST['tel']);
                                            $adresse = $filter->getCleanInput($_POST['adresse']);
                                            $addliv = $filter->getCleanInput($_POST['addliv']);
                                            $region = $filter->getCleanInput($_POST['region']);
                                            $depart_ville = $filter->getCleanInput($_POST['depart_ville']);
                                            $total = $filter->getCleanInput($_POST['total']);
                                            $datetime = $date->snDateTime();
                                            $datetimeArray = explodeAssoc(" ", $datetime, ["date", "time"]);
                                            $date = $datetimeArray["date"];
                                            $time = $datetimeArray["time"];
                                            $values = [
                                                'prenom' => $firstname,
                                                'nom' => $lastname,
                                                'tel' => $tel,
                                                'adresse' => $adresse,
                                                'adresse_livraison' => $addliv,
                                                'mode_payment' => 'cash à la livraison',
                                                'total_commande' => $total,
                                                'code_panier' => $_SESSION['cart_code'],
                                                'c_date' => $date,
                                                'c_hour' => $time
                                            ];
                                            $quantities = $stmt->getFieldInfo("produit","qte_stock, qte_seuil, code_produit");
                                            $no_rupt = false;
                                            foreach ($_SESSION['cart_item'] as $k => $v):
                                                foreach ($quantities as $quantity):
                                                    if ((($quantity['qte_stock'] - $v['qte']) > $quantity['qte_seuil']) && ($quantity['code_produit'] == $v['code_produit'])):
                                                        $no_rupt = true;
                                                        break;
                                                    else:
                                                        Locate::To("../panier/rupture");
                                                    endif;
                                                endforeach;
                                                if ($no_rupt):
                                                    $val = [
                                                        "id" => $v['id'],
                                                        "code_panier" => $v['code_panier'],
                                                        "libelle" => $v['libelle'],
                                                        "pu" => $v['pu'],
                                                        "image_produit" => $v['image_produit'],
                                                        "qte" => $v['qte'],
                                                        "prix" => $v['prix'],
                                                        "code_produit" => $v['code_produit'],
                                                        "categorie" => $v['categorie']
                                                    ];
                                                    $insert->addInfo("panier", $val);
                                                endif;
                                            endforeach;
                                            $insert->addInfo("commande", $values);
                                            unset($_SESSION['cart_code']);
                                            unset($_SESSION['cart_item']);
                                            header('location: ../panier/success');
                                        else:
                                            Locate::To("../panier/empty_depart_ville");
                                        endif;
                                    else:
                                        Locate::To("../panier/empty_city");
                                    endif;
                                else:
                                    Locate::To("../panier/empty_ship_add");
                                endif;
                            else:
                                Locate::To("../panier/empty_add");
                            endif;
                        else:
                            Locate::To("../panier/empty_tel");
                        endif;
                    else:
                        Locate::To("../panier/empty_lastname");
                    endif;
                else:
                    Locate::To("../panier/empty_firstname");
                endif;
            else:
                Locate::To("../panier/empty_fields");
            endif;
        else:
            Locate::To("../panier/empty_cart");
        endif;
    endif;