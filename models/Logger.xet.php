<?php
class Logger
{
    private static bool $_logStatus = false;
    private static string $_logError = '';

    /**
     * Cette methode permet d'authentifier un utilisateur de manière sécurisé en vérifiant toutes les entrées.
     * @param array $array le tableau envoyé par l'utilisateur avec la methode post ($_POST)
     * @param string $table la table ou se trouve les infos de l'utilisateur
     * @param array $fields tableau associatif $key => $value dont la clé est un champ de la BD et la valeur est le champ correspondant dans le formulaire
     * @param string $passwordName la valeur de l'attribut name du champ de type password de votre formulaire s'il y'en a
     * @param string $mail la valeur de l'attribut name du champ de type email de votre formulaire s'il y'en a
     * @param array $fieldsSyntax tableau associatif $key => $value dont la clé est le nom d'un champ de votre formulaire et $value un tableau
     * [$regex, $minLength, $maxlength] respectivement l'expression régulière , le longueur minimale et la longueur maximale accepté par le champ
     * @return array un tableau avec deux valeurs status le statut de la connexion et error s'il y'a une erreur
     */
    public static function logUser(array $array, string $table, array $fields, string $passwordName = '', string $mail = '', array $fieldsSyntax = []):array
    {
        define("SYNTAX_COUNT", 3);
        $f = count($fieldsSyntax);
        $m = count($fields);
        $Empty = true;
        $isValid = [];
        $isMatch = 0;
        $filter = new FilterInput();
        $select = new ShowInfos();
        if (isset($array)):
            array_pop($array);
            $cleanArray = $filter->getCleanInput($array, true);
            extract($cleanArray);
            foreach ($cleanArray as $key => $value):
                if (!empty($$key) && $$key === $value):
                    $Empty = false;
                else:
                    self::$_logError = "empty_{$key}";
                    goto retourner;
                endif;
            endforeach; 
            if (!$Empty):
                $log_info = $select->getInfo($table);
                if (is_string($mail) && $mail != '' && isset($$mail)):
                    if ($filter->validEmail($$mail)):
                        $isValid['mail'] = true;
                    else:
                        self::$_logError = "bad_mail_syntax";
                        goto retourner;
                    endif;
                endif;
                $isValid["validField"] = 0;
                if ($f > 0):
                    foreach ($fieldsSyntax as $field => $syntax):
                        if (is_array($syntax) && (count($syntax) === SYNTAX_COUNT)):
                            $pattern = (string) $syntax[0];
                            $minLength = (int) $syntax[1];
                            $maxLength = (int) $syntax[2];
                            if (isset($$field) && preg_match($pattern, $$field)):
                                if ($minLength > 0 && strlen($$field) > $minLength):
                                    if ($maxLength > 0 && strlen($$field) < $maxLength):
                                        $isValid['validField'] += 1;
                                    else:
                                        self::$_logError = "{$field}_tooLong";
                                        goto retourner;
                                    endif;
                                else:
                                    self::$_logError = "{$field}_tooShort";
                                    goto retourner;
                                endif;
                            else:
                                self::$_logError = "bad_{$field}_syntax";
                                goto retourner;
                            endif;
                        else:
                            self::$_logError = "bad_syntax_type";
                            goto retourner;
                        endif;
                    endforeach;
                else:
                    $isValid['nofieldValid'] = true;
                endif;
                if ($isValid['validField'] === $f):
                    foreach ($fields as $db_field => $f_field):
                        if(isset($$f_field)):
                            foreach ($log_info as $info):
                                if ((is_string($passwordName) && isset($$passwordName)) && strcmp("$$passwordName", "$$f_field") == 0):
                                    if ($filter->verifyPassword($$passwordName, $info[$db_field])):
                                        $isMatch += 1;
                                    else:
                                        self::$_logError = "not_match_$f_field";
                                        goto retourner;
                                    endif;
                                elseif ($$f_field == $info["$db_field"]):
                                    $isMatch += 1;
                                else:
                                    self::$_logError = "not_match_$f_field";
                                    goto retourner;
                                endif;
                            endforeach;
                        endif;
                    endforeach;
                endif;
                if ((isset($isValid['mail']) && $isValid['mail'])
                    && ((isset($isMatch) && $isMatch === $m)
                        || (isset($isValid['nofieldValid']) && $isValid['nofieldValid']))):
                    foreach ($fields as $db_field => $f_field):
                        foreach ($log_info as $info):
                            if (strcmp("$$passwordName", "$$f_field") != 0):
                                $_SESSION[$f_field] = $info[$f_field];
                            endif;
                        endforeach;
                    endforeach;
                    self::$_logStatus = true;
                    self::$_logError = '0';
                endif;
            endif;
        endif;
        retourner:
        return ["status" => self::$_logStatus, "error" => self::$_logError];
    }
}