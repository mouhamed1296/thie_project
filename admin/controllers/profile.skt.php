<?php
    include_once dirname(__FILE__).'/../../includes/class_autoloader.inc.php';
    $debug = new  Debug();
    $filter = new FilterInput();
    $update = new UpdateInfos();
    $select = new ShowInfos();

    if (isset($_POST['update'])):
        if(!empty($_POST['prenom']) || !empty($_POST['nom'])
            || !empty($_POST['username']) || !empty($_POST['email'])
            || !empty($_POST['password']) || !empty($_POST['newpassword']) || !empty($_POST['confirmpassword'])):
            if(!empty($_POST['prenom'])):
                if (!empty($_POST['nom'])):
                    if (!empty($_POST['username'])):
                        if (!empty($_POST['email'])):
                            $mail_check = $filter->validEmail($_POST['email']);
                            if($mail_check == true):
                                if(!empty($_POST['password'])):
                                    if (!empty($_POST['newpassword'])):
                                        if (!empty($_POST['confirmpassword'])):
                                            $prenom = $filter->getCleanInput($_POST['prenom']);
                                            $nom = $filter->getCleanInput($_POST['nom']);
                                            $username = $filter->getCleanInput($_POST['username']);
                                            $email = $filter-> getCleanInput($_POST['email']);
                                            $password = $filter->getCleanInput($_POST['password']);
                                            $newPassword = $filter->getCleanInput($_POST['newpassword']);
                                            $confirmPassword = $filter->getCleanInput($_POST['confirmpassword']);
                                            if($newPassword === $confirmPassword):
                                                $infos = $select->getInfo('admin');
                                                $exist = false;
                                                foreach ($infos as $info):
                                                    if(!$filter->verifyPassword($password, $info['password'])):
                                                        $exist = false;
                                                        $infoError = 'unknown_pwd';
                                                        break;
                                                    else:
                                                        $exist = true;
                                                        $infoError = 'success';
                                                        break;
                                                    endif;
                                                endforeach;
                                                if($exist):
                                                    $hashedPassword = $filter->passwordHash($newPassword);
                                                    $values = [
                                                        "prenom" => $prenom,
                                                        "nom" => $nom,
                                                        "username" => $username,
                                                        "email" => $email,
                                                        "password" => $hashedPassword
                                                    ];
                                                    $where = [
                                                        "email" => $email
                                                    ];
                                                    $update->changeInfo("admin", $values, $where);
                                                    header('location: ../profile/success');
                                                else:
                                                    header('location: ../profile/'.$infoError);
                                                endif;
                                            else:
                                                header('location: ../profile/no_match');
                                            endif;
                                        else:
                                            header('location: ../profile/empty_confirm_pwd');
                                        endif;
                                    else:
                                        header('location: ../profile/empty_new_pwd');
                                    endif;
                                else:
                                    header('location: ../profile/empty_pwd');
                                endif;
                            else:
                                header('location: ../profile/invalid_mail');
                            endif;
                        else:
                            header('location: ../profile/empty_email');
                        endif;
                    else:
                        header('location: ../profile/empty_uname');
                    endif;
                else:
                    header('location: ../profile/empty_lastname');
                endif;
            else:
                header('location: ../profile/empty_firstname');
            endif;
        else:
            header('location: ../profile/empty_fields');
        endif;
    elseif (isset($_SESSION['uname'])):
        $errors = [
            'none' => 'Vos informations ont été mis à jour avec succés !!!',
            'empty_fields' => 'Veuillez remplir les champs!!!',
            'empty_firstname' => 'Veuillez saisir votre prénom!!!',
            'empty_lastname' => 'Veuillez saisir votre nom!!!',
            'empty_username' => 'Veuillez saisir votre pseudo!!!',
            'empty_email' => 'Veuillez saisir votre email!!!',
            'invalid_mail' => 'Veuillez saisir un email invalide!!!',
            'empty_pwd' => 'Veuillez saisir votre mot de passe!!!',
            'empty_new_pwd' => 'Veuillez saisir votre nouveau mot de passe!!!',
            'empty_confirm_pwd' => 'Veuillez confirmer votre nouveau mot de passe!!!',
            'unknown_pwd' => 'Le mot de passe entré n\'existe pas',
            'no_match' => 'le nouveau mot de passe et la confirmation ne correspondent pas'
        ];
        if(isset($_GET['error'])):
            $error = $filter->getCleanInput($_GET['error']);
            $message = $errors["$error"];
        endif;
        include dirname(__FILE__).'/../views/profile.gis.php';
    else:
        header('location: login');
    endif;
