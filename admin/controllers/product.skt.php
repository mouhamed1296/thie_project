<?php
    require_once dirname(__FILE__).'/../../includes/class_autoloader.inc.php';
    $filter = new FilterInput();
    $insert = new AddInfos();
   
    if (isset($_POST['add'])):
        /*$file = new File("file");
        
        if(FileUpload::getUploadedFile($file) instanceof FileUpload):
            $file_upload = new FileUpload($file->getFileTmpName());
            echo 'name: ' . $file->getFileName() . '<br>';
            //$file->setFilename("mon image.jpg");
            //echo 'name: ' . $file->getFileName() . '<br>';
            echo 'error: ' . $file->getFileError() . '<br>';
            echo 'size: ' . $file->getFileSize() . '<br>';
            echo 'extension: ' . $file->getFileExtension() . '<br>';
            echo 'tmp_name: ' . $file->getFileTmpName() . '<br>';
            Debug::showArray($file->getFile());
            FileUpload::moveUploadedFile($file_upload, "../../uploads/" . $file->getFileName());
        else:
            echo FileUpload::getUploadedFile($file);
        endif;
        exit;*/
        if (!empty($_POST['libelle']) || !empty($_POST['categorie']) || !empty($_POST['pu'])
            || !empty($_POST['qte_stock']) || !empty($_POST['qte_seuil']) || !empty($_POST['code_prod'])
            || !empty($_POST['fournisseur']) || !empty($_POST['description'])):
            if($_FILES['file']['size'] != 0 && $_FILES['file']['error'] === 0):
                if (!empty($_POST['libelle'])):
                    if(!empty($_POST['categorie'])):
                        if (!empty($_POST['pu'])):
                            if(!empty($_POST['qte_stock'])):
                                if (!empty($_POST['qte_seuil'])):
                                    if (!empty($_POST['code_prod'])):
                                        if (!empty($_POST['fournisseur'])):
                                            if (!empty($_POST['description'])):
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
                                                                        $pu = $filter->getCleanInput($_POST['pu']);
                                                                        $qteStock = $filter->getCleanInput($_POST['qte_stock']);
                                                                        $qteSeuil = $filter->getCleanInput($_POST['qte_seuil']);
                                                                        $codeProd = $filter->getCleanInput($_POST['code_prod']);
                                                                        $fournisseur = $filter->getCleanInput($_POST['fournisseur']);
                                                                        $description = $filter->getCleanInput($_POST['description']);
                                                                        $imgName = $libelle.$ext;
                                                                        $values = [
                                                                            "libelle" ,$libelle,
                                                                            "categorie" ,$categorie,
                                                                            "pu" ,$pu,
                                                                            "qte_stock" ,$qteStock,
                                                                            "qte_seuil" ,$qteSeuil,
                                                                            "image_produit" ,"uploads/$imgName",
                                                                            "code_produit" ,$codeProd,
                                                                            "fournisseur" ,$fournisseur,
                                                                            "description" ,$description
                                                                        ];

                                                                        if (move_uploaded_file($_FILES["file"]["tmp_name"],"../../uploads/".$imgName)):
                                                                            $inserted = (int) $insert->addInfo("produit", $values);
                                                                            if ($inserted > 0):
                                                                                View::redirect("../product/add/success", "none", "Produit ajouté avec succés");
                                                                            else:
                                                                                View::redirect("../product/add/insert_error", "insert_error", "Une erreur est survenue lors de l'insertion veuillez réessayer");
                                                                            endif;
                                                                        else:   
                                                                            View::redirect("../product/add/upload_fail", "upload_fail", "Une erreur est survenue lors du chargement de l'image veuillez réessayer");
                                                                        endif;
                                                                    else:
                                                                        View::redirect("../product/cant_write","cant_write", "Impossible d'écrire sur le fichier d'upload");
                                                                    endif;
                                                                else:
                                                                    View::redirect("../product/no_temp_folder", "no_temp_folder", "Un fichier temporaire est manquant");
                                                                endif;
                                                            else:
                                                                View::redirect("../product/no_file_uploaded", "no_file_uploaded", "L'image n'as pas été téléchargée");
                                                            endif;
                                                        else:
                                                            View::redirect("../product/partial_upload", "partial_upload", "L'image n'as pas été complétement téléchargée");
                                                        endif;
                                                    else:
                                                        View::redirect("../product/add/big_file", "big_file", "L'image choisi est trop grand veuillez choisir une image de taille <= 2Mo");
                                                    endif;
                                                else:
                                                    View::redirect("../product/add/invalid_extension", "invalid_extension", "Extension invalide, sont acceptés: .jpg .png ou .jpeg");
                                                endif;
                                            else:
                                                View::redirect("../product/add/empty_desc", "empty_desc", "Veuillez la description du produit");
                                            endif;
                                        else:
                                            View::redirect("../product/add/empty_fnr", "empty_fnr", "Veuillez saisir le fournisseur");
                                        endif;
                                    else:
                                        View::redirect("../product/add/empty_codeProd", "empty_codeProd", "Veuillez saisir le code du produit");
                                    endif;
                                else:
                                    View::redirect("../product/add/empty_qteSeuil", "empty_qteSeuil", "Veuillez saisir la quantite seuil");
                                endif;
                            else:
                                View::redirect("../product/add/empty_qteStock", "empty_qteStock", "Veuillez saisir la quantite en stock");
                            endif;
                        else:
                            View::redirect("../product/add/empty_pu", "empty_pu", "Veuillez saisir le prix unitaire",);
                        endif;
                    else:
                        View::redirect("../product/add/empty_category", "empty_category", "Veuillez saisir la categorie du produit");
                    endif;
                else:
                    View::redirect("../product/add/empty_libelle", "empty_libelle", "Veuillez saisir le nom du produit");
                endif;
            else:
                View::redirect("../product/add/no_image", "no_image", "Veuillez choisir une image");
            endif;
        else:
            View::redirect("../product/add/empty_fields", "empty_fields", "Veuillez remplir tous les champs");
        endif;
    elseif(isset($_SESSION['uname'])):
        if (isset($_GET['sub_page'])):
            $subPage = $filter->getCleanInput($_GET['sub_page']);
            switch ($subPage):
                case "addProduct":
                    $message = "";
                    if (isset($_GET['error'])):
                        $error = (new HandleError($_GET['error']))::getError();
                        $message = (new HandleError($_GET['error']))::getMessage();
                    endif;
                    Import::import("../admin/views/addProduct.gis.php", "include_once", ["error" => $error, "message" => $message]);
                    break;
                case "viewProduct":
                    Import::import("../admin/views/viewProduct.gis.php");
                    break;
                case "editProduct":
                    Import::import("../admin/views/editProduct.gis.php");
                    break;
                case "deleteProduct":
                    Import::import("../admin/views/deleteProduct.gis.php");
                    break;
                default:
                    View::redirect("login");
                    break;
            endswitch;
        endif;
    else:
        View::redirect("login");
    endif;
