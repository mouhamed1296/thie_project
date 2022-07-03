<?php
    include_once dirname(__FILE__).'/../../includes/class_autoloader.inc.php';
    $filter = new FilterInput();
    $insert = new AddInfos();
     $date = new DateSn();
     $datetime = $date->snDateTime();

    if(isset($_POST["add"])):
        if (!empty($_POST['libelle']) || !empty($_POST['categorie']) || !empty($_POST['auteur'])
            || !empty($_POST['contenu'])):
            if($_FILES['file']['size'] != 0 && $_FILES['file']['error'] === 0):
                if (!empty($_POST['libelle'])):
                    if(!empty($_POST['categorie'])):
                        if (!empty($_POST['auteur'])):
                            if(!empty($_POST['contenu'])):
                                $typarr = explode(".", $_FILES['file']['name']);
                                $ext = '.'.$typarr[1];
                                $extArray = ['.jpeg', '.jpg', '.png'];
                                define("MAX_FILE_SIZE", 2097152);
                                if (in_array($ext, $extArray)):
                                    if ($_FILES['file']['size'] <= MAX_FILE_SIZE):
                                        if($_FILES['file']['error'] !== 3):
                                            if($_FILES['file']['error'] !== 4):
                                                if($_FILES['file']['error'] !== 6):
                                                    if($_FILES['file']['error'] !== 7):
                                                        $libelle = $filter->getCleanInput($_POST['libelle']);
                                                        $categorie = $filter->getCleanInput($_POST['categorie']);
                                                        $auteur = $filter->getCleanInput($_POST['auteur']);
                                                        $contenu = $filter->getCleanInput($_POST['contenu']);
                                                        $imgName = $libelle.$ext;
                                                        $values = [
                                                            "titre" => $libelle,
                                                            "categorie" => $categorie,
                                                            "contenu" => $contenu,
                                                            "auteur" => $auteur,
                                                            "image_article" => "uploads/$imgName",
                                                            "date_pub" => $datetime
                                                        ];

                                                        if (move_uploaded_file($_FILES["file"]["tmp_name"],"../../uploads/".$imgName)):
                                                            $inserted = (int) $insert->addInfo("articles", $values);
                                                            if ($inserted > 0):
                                                                Locate::To("../article/add/success");
                                                            else:
                                                                Locate::To("../article/add/insert_error");
                                                            endif;
                                                        else:   
                                                            Locate::To("../article/add/upload_fail");
                                                        endif;
                                                    else:
                                                        Locate::To("../article/cant_write");
                                                    endif;
                                                else:
                                                    Locate::To("../article/no_temp_folder");
                                                endif;
                                            else:
                                                Locate::To("../article/no_file_uploaded");
                                            endif;
                                        else:
                                            Locate::To("../article/partial_upload");
                                        endif;
                                    else:
                                        Locate::To("../article/add/big_file");
                                    endif;
                                else:
                                    Locate::To("../article/add/invalid_extension");
                                endif;
                            else:
                                Locate::To("../product/add/empty_cont");
                            endif;
                        else:
                            Locate::To("../product/add/empty_auteur");
                        endif;
                    else:
                        Locate::To("../product/add/empty_categorie");
                    endif;
                else:
                    Locate::To("../product/add/empty_libelle");
                endif;
            else:
                Locate::To("../product/add/no_image");
            endif;
        else:
            Locate::To("../product/add/empty_fields");
        endif;
    elseif (isset($_SESSION['uname'])):
        switch ($_GET["sub_page"]):
            case "add":
                if (isset($_GET['error'])):
                    $errors = [
                        "empty_fields" => "Veuillez remplir tous les champs",
                        "no_image" => "Veuillez choisir une image",
                        "empty_libelle" =>"Veuillez saisir le nom de l'article",
                        "empty_category" => "Veuillez saisir la categorie de l'article",
                        "empty_auteur" => "Veuillez saisir l'auteur de l'article",
                        "empty_cont" => "Veuillez la description de l'article",
                        "invalid_extension" => "Extension invalide, sont acceptés: .jpg .png ou .jpeg",
                        "big_file" => "L'image choisi est trop grand veuillez choisir une image de taille <= 2Mo",
                        "partial_upload" => "L'image n'as pas été complétement téléchargée",
                        "no_file_uploaded" => "L'image n'as pas été téléchargée",
                        "no_temp_folder" => "Un fichier temporaire est manquant",
                        "cant_write" => "Impossible d'écrire sur le fichier d'upload",
                        "insert_error" => "Une erreur est survenue lors de l'insertion veuillez réessayer",
                        "upload_fail" => "Une erreur est survenue lors du chargement de l'image veuillez réessayer",
                        "none" => "Produit ajouté avec succés"
                    ];
                    $error = $filter->getCleanInput($_GET['error']);
                    $message = $errors["$error"];
                endif;
                Import::import("../admin/views/addArticle.gis.php");
                break;
            case "view":
                Import::import("../admin/views/viewArticle.gis.php");
                break;
            case "edit":
                Import::import("../admin/views/editArticle.gis.php");
                break;
            case "delete":
                Import::import("../admin/views/deleteArticle.gis.php");
                break;
            default:
                Locate::To("login");
                break;
        endswitch;
    else:
        Locate::To("login");
    endif;