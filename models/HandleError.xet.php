<?php
class HandleError
{
    private static string $_message;
    private static string $_error;
    private static string $_path;
    private string $_json_filename = 'errors.json';
    public function __construct(string $error = "")
    {
        $this->_setError($error);
    }
    /**
     * Cette methode permet de retourner le chemin menant vers le fichier des erreurs 
     *
     * @return string le chemin vers le fichier errors.json
     */
    private static function _setPath(): string
    {
        self::$_path = dirname(__FILE__) . "/../private";
        $filename = self::$_path ."/".(new HandleError(self::$_error))->_json_filename;
        return $filename;
    }

    /**
     * @return string
     */

    public static function getError(): string
    {
        return self::$_error;
    }

    /**
     * Cette methode permet de retourner le message correspondant 
     * à une erreur passée en paramètre au constructeur
     * en le filtrant (effectuant tous les test nécessaire à la validation de l'erreur)
     * avant de retourner le message correspondant à l'erreur 
     * @return string message
    */

    public static function getMessage():string
    {
        self::$_message = (new HandleError(self::$_error))->_getErrorMessage();
        return self::$_message;
    }

    /**
     * Cette methode permet d'ajouter un noveau message d'erreur associé à l'erreur qui lui correspond  
     * @param string $error le nom de l'erreur à ajouter
     * @param string $message le message correspondant à l'erreur
     * @return int le statut de l'ajout du nmessage
     */

    public static function setErrorMessage(string $error, string $message):int
    {
        $status = 0;
        if (is_string($message) && is_string($error)):
            #File name
            $filename =self::_setPath();
            if (is_file($filename)):
                $errors = file_get_contents($filename);
                $errors = json_decode($errors, true);
                $errors["${error}"] = $message;
                $json = json_encode($errors, JSON_PRETTY_PRINT);
                if (file_put_contents($filename, $json, LOCK_EX) === false):
                    echo "Error saving json file";
                    die();
                else:
                    $status = 1;
                endif;
            else:
                echo "No file have been founded";
            endif;
        else:
            echo "Veuillez sasir une chaine de caractère";
        endif;
        return $status;
    }

    /**
     * @param string $error
     */

    private function _setError(string $error):void
    {
        $filter = new FilterInput();
        $clean_error = $filter->getCleanInput($error);
        self::$_error = $clean_error;
    }

    /**
     * @return string
     */

    private function _getErrorMessage():string
    {
        if (is_file(self::_setPath())):
            $errors = file_get_contents(self::_setPath());
            $errors = json_decode($errors, true);
            foreach ($errors as $error => $message):
                if (self::getError() === $error):
                    self::$_message = $message;
                    break;
                else:
                    self::$_message = "Une erreur est survenue.Veuillez Réessayer!!";
                endif;
            endforeach;
        endif;
        return self::$_message;
    }
}