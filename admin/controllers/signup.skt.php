<?php
    include_once dirname(__FILE__).'/../../includes/class_autoloader.inc.php';
    $insert = new AddInfos();
    $select = new ShowInfos();
    $filter = new FilterInput();
    $errors = [];
    if (isset($_POST['signup'])):
        if(!empty($_POST['prenom']) || !empty($_POST['nom']) || !empty($_POST['username']) || !empty($_POST['email']) || !empty($_POST['password'])):
            if(!empty($_POST['prenom'])):
                if(!empty($_POST['nom'])):
                    if(!empty($_POST['username'])):
                        if(!empty($_POST['email'])):
                            $mail_check = $filter->validEmail($_POST['email']);
                            if($mail_check == true):
                                if(!empty($_POST['password'])):
                                    $prenom = $filter->getCleanInput($_POST['prenom']);
                                    $nom = $filter->getCleanInput($_POST['nom']);
                                    $username = $filter->getCleanInput($_POST['username']);
                                    $email = $filter-> getCleanInput($_POST['email']);
                                    $password = $filter->getCleanInput($_POST['password']);
                                    $infos = $select->getInfo('admin');
                                    $exist = false;
                                    foreach ($infos as $info):
                                        if($info['username'] == $username):
                                            $exist = true;
                                            $log_error = 'uname_already_exist';
                                            break;
                                        elseif($info['email'] == $email):
                                            $exist = true;
                                            $log_error = 'email_already_exist';
                                            break;
                                        elseif($filter->verifyPassword($password, $info['password'])):
                                            $exist = true;
                                            $log_error = 'pwd_already_exist';
                                            break;
                                        else:
                                            $exist = false;
                                        endif;
                                    endforeach;
                                    if($exist):
                                        header('location: ../signup/'.$log_error);
                                    else:
                                        $hashed_password = $filter->passwordHash($password);
                                        $values = [
                                            'prenom' => $prenom,
                                            'nom' => $nom,
                                            'username' => $username,
                                            'email' => $email,
                                            'password' => $hashed_password
                                        ];
                                        $insert->addInfo('admin', $values);
                                        header('location:../signup/success');
                                    endif;
                                else:
                                    header('location:../signup/empty_pwd');
                                endif;
                            else:
                                header('location:../signup/invalid_mail');
                            endif;
                        else:
                            header('location:../signup/empty_email');
                        endif;
                    else:
                        header('location:../signup/empty_username');
                    endif;
                else:
                    header('location:../signup/empty_lastname');
                endif;
            else:
                header('location:../signup/empty_firstname');
            endif;
        else:
            header('location:../signup/empty_fields');
        endif;
    else:
        $errors = [
            'none' => 'Inscription réussie',
            'empty_fields' => 'Veuillez remplir les champs!!!',
            'empty_firstname' => 'Veuillez saisir un prénom!!!',
            'empty_lastname' => 'Veuillez saisir un nom!!!',
            'empty_username' => 'Veuillez saisir votre pseudo!!!',
            'empty_email' => 'Veuillez saisir un email!!!',
            'invalid_mail' => 'Veuillez saisir un email invalide!!!',
            'empty_pwd' => 'Veuillez saisir un mot de passe!!!',
            'uname_already_exist' => 'Le pseudo entré existe déjà',
            'email_already_exist' => 'L\'email entré existe déjà',
            'pwd_already_exist' => 'Le mot de passe entré existe déjà'
        ];
        if(isset($_GET['error'])):
            $error = $filter->getCleanInput($_GET['error']);
            $message = $errors["$error"];
        endif;
        include dirname(__FILE__).'/../views/signup.gis.php';
    endif;
