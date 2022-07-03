<?php
    declare(strict_types = 1);
    class FilterInput
    {
        private string $_type;
        private bool $_format;
        private int $_n;
        private array $_cleanArray;
        private function _getType($input):string
        {
            return gettype($input);
        }

        private function _filterArray(array $array):array
        {
            if(is_array($array)):
                $this->_n = count($array);
                $i = 0;
                while ($i <= $this->_n):
                    $arrayItem = $array["$i"];
                    $cleanArrayItem = $this->getCleanInput($arrayItem);
                    $this->_cleanArray["$i"] = $cleanArrayItem;
                    $i++;
                endwhile;
            else:
                $this->_cleanArray = [];
            endif;
            return $this->_cleanArray;
        }
        private function _filterAssocArray(array $array):array
        {
            if (is_array($array)):
                foreach ($array as $key => $value):
                    $arrayItem = $array["$key"];
                    $cleanArrayItem = $this->getCleanInput($arrayItem);
                    $this->_cleanArray["$key"] = $cleanArrayItem;
                endforeach;
            else:
                $this->_cleanArray = [];
            endif;
            return $this->_cleanArray;
        }
        public function getCleanInput($input, bool $assoc = false)
        {
            $this->_type = $this->_getType($input);
            switch ($this->_type) {
                case 'string':
                    $cleaninput = trim(strip_tags(filter_var($input, FILTER_SANITIZE_STRING)));
                    break;
                case 'int':
                    $cleaninput = trim(strip_tags(filter_var($input, FILTER_SANITIZE_NUMBER_INT)));
                    break;
                case 'array':
                    if ($assoc == false):
                        $cleaninput = $this->_filterArray($input);
                    elseif ($assoc == true):
                        $cleaninput = $this->_filterAssocArray($input);
                    else:
                        echo 'unknown array type';
                    endif;
                    break;
                case 'boolean':
                    $cleaninput = trim(strip_tags(filter_var($input, FILTER_VALIDATE_BOOLEAN)));
                    break;
                case 'float':
                    $cleaninput = trim(strip_tags(filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT)));
                    break;
                default:
                    $cleaninput = trim(strip_tags(filter_var($input, FILTER_DEFAULT)));
                    break;
            }
            return $cleaninput;
        }
        private function passwordCheck(string $password)
        {
            return $this->getCleanInput($password);
        }
        public function passwordHash(string $password)
        {
            $clean_pwd = $this->passwordCheck($password);
            return password_hash($clean_pwd, PASSWORD_DEFAULT);
        }
        public function verifyPassword(string $password, string $dbpassword)
        {
            $clean_pwd = $this->passwordCheck($password);
            return password_verify($clean_pwd, $dbpassword);
        }
        public function validEmail(string $email)
        {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)):
                return false;
            else:
                return true;
            endif;
        }
        public function checkFormat($input, string $regex)
        {
            $this->_type = $this->_getType($input);
            switch ($this->_type):
                case 'string':
                    if(!preg_match($regex, $input)):
                        $this->_format = true;
                    else:
                        $this->_format = false;
                    endif;
                    break;
            endswitch;
        }
         public function checkLength($input, $minLength = 1, $maxLength = 1)
         {

         }
    }
