<?php
    include dirname(__FILE__).'/../../functions/checkSessionStatus.func.php';
    include_once dirname(__FILE__).'/../../includes/class_autoloader.inc.php';

    if(checkSessionStatus() === false):
       session_start();
    endif;
    $select = new ShowInfos();
    $filter = new FilterInput();
    $errors = [];
    if(isset($_POST['login'])):
        if(!empty($_POST['username']) || !empty($_POST['email']) || !empty($_POST['password'])):
            if(!empty($_POST['username'])):
                if(!empty($_POST['email'])):
                    if(!empty($_POST['password'])):
                        $username = $filter->getCleanInput($_POST['username']);
                        $email = $filter->getCleanInput($_POST['email']);
                        $password = $filter->getCleanInput($_POST['password']);
                        $email_check = $filter->validEmail($email);
                        if($email_check == true):
                            $log_info = $select->getInfo('admin');
                            $is_admin = true;
                            foreach ($log_info as $info):
                                if($info['username'] === $username):
                                    if($info['email'] === $email):
                                        if($filter->verifyPassword($password, $info['password'])):
                                            $_SESSION['nom'] = $info['nom'];
                                            $_SESSION['prenom'] = $info['prenom'];
                                            $_SESSION['uname'] = $info['username'];
                                            $is_admin = true;
                                            break;
                                        else:
                                            $is_admin = false;
                                            $log_error = 'pwd_invalid';
                                            break;
                                        endif;
                                    else:
                                        $is_admin = false;
                                        $log_error = 'email_invalid';
                                        break;
                                    endif;
                                else:
                                    $is_admin = false;
                                    $log_error = 'uname_invalid';
                                    break;
                                endif;
                            endforeach;
                            if($is_admin):
                                header('location: ../dashboard');
                                exit;
                            else:
                                header('location: ../login/'.$log_error);
                                exit;
                            endif;
                        else:
                            header('location: ../login/invalid_mail_format');
                            exit;
                        endif;
                    else:
                        header('location: ../login/empty_pwd');
                        exit;
                    endif;
                else:
                    header('location: ../login/empty_email');
                    exit;
                endif;
            else:
                header('location: ../login/empty_username');
                exit;
            endif;
        else:
            header('location: ../login/empty_fields');
            exit;
        endif;
    else:
        $errors = [
            'empty_fields' => 'Veuillez remplir les champs!!!',
            'empty_username' => 'Veuillez saisir votre pseudo!!!',
            'empty_email' => 'Veuillez saisir un email!!!',
            'invalid_mail_format' => 'Veuillez saisir un email dans ce format example@gmail.com!!!',
            'empty_pwd' => 'Veuillez saisir un mot de passe!!!',
            'pwd_invalid' => 'Le mot de passe saisie est incorrecte',
            'email_invalid' => 'L\'adresse mail saisie est incorrecte',
            'uname_invalid' => 'Le pseudo saisie est incorrecte'
        ];
        if(isset($_GET['error'])):
            $error = $filter->getCleanInput($_GET['error']);
            $message = $errors["$error"];
        endif;
        include dirname(__FILE__).'/../views/login.gis.php';
    endif;
