<?php
require_once (dirname(__FILE__).'/../includes/class_autoloader.inc.php');
$insert = new AddInfos();
$filter = new FilterInput();
if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    if (isset($_POST["send"]))
    {
        $nom = $filter->getCleanInput($_POST["nomid"]);
        $prenom = $filter->getCleanInput($_POST["prenomid"]);
        $sexe = $filter->getCleanInput($_POST["sexe"]);
        $adresse = $filter->getCleanInput($_POST["adresseid"]);
        $email = $filter->getCleanInput($_POST["emailid"]);
        $objet = $filter->getCleanInput($_POST["objet"]);
        $message = $filter->getCleanInput($_POST["message"]);
        if (empty($nom) || empty($prenom) || empty($sexe) || empty($adresse) || empty($email) || empty($objet) || empty($message))
        {
            header("location:../contact/emptyfields");
            exit();
        }
        else if  (!preg_match("/^[a-zA-Z]*$/", $nom) || !preg_match("/^[a-zA-Z]*$/", $prenom))
        {
        header("location:../contact/invalidprenomnom");
        exit();
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("location:../contact/invalidmail");
        }
        else
        {
            $values = [
                'nom' => $nom,
                'prenom' => $prenom,
                'sexe' => $sexe,
                'adresse' => $adresse,
                'email' => $email,
                'objet' => $objet,
                'message' => $message
            ];
            $insert->addInfo('contact', $values);
            header("location:../contact/success");
        }
    }
}
else
{
    throw new Exception("Erreur la requête n'a pas été éxécuté");
}
