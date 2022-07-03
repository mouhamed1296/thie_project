<?php
    class File 
    {
        private string $_file_name;
        private string $_file_extension;
        private string $_file_tmp_name;
        private int $_file_size;
        private int $_file_error;
        private array $_file;
        
        public function __construct($fileField)
        {
            $this->_setFile($fileField);
        }

        /* Getters */

        /**
         * @return string le nom du fichier
         */

        public function getFilename():string
        {
            return $this->_file_name;
        }
        
        /**
         * @return string l'extension du fichier
         */


        public function getFileExtension():string
        {
            return $this->_file_extension;
        }

        /**
         * @return string le chemin temporaire vers le fichier
         */


        public function getFileTmpName():string
        {
            return $this->_file_tmp_name;
        }
        /**
         * @return int la taille du fichier
         */


        public function getFileSize():int
        {
            return $this->_file_size;
        }
        

        /**
         * @return int le code d'erreur
         */

        public function getFileError():int
        {
            return $this->_file_error;
        }

        /* SETTERS */

        /**
         * @param string $filename
         */

        public function setFilename($filename = "")
        {
            if ($filename === ""):
                $this->_file_name = $this->_file['name'];
            else:
                $filename = (new FilterInput)->getCleanInput($filename);
                $this->_file_name = $filename;
            endif;
        }

        /**
         * @param string $extension
         */

        public function setFileExtension(string $extension = "")
        {
            if ($extension === ""):
                if($this->_file['name'] !== ""):
                    $extension = explode(".", $this->_file['name']);
                    $this->_file_extension = $extension[1];
                else:
                    $this->_file_extension = "";
                endif;
            else:
                $extension = (new FilterInput)->getCleanInput($extension);
                $this->_file_name = $extension;
            endif;
        }
        private function setFileTmpName()
        {
            $this->_file_tmp_name = $this->_file['tmp_name'];
        }

        /**
         * @param int $size
         */

        public function setFileSize(string $size = "")
        {
            if ($size === ""):
                $this->_file_size = $this->_file['size'];
            else:
                $size = (new FilterInput)->getCleanInput($size);
                $this->_file_name = $size;
            endif;
        }

        /**
         * @param int $error
         */

        public function setFileError($error = "")
        {
            if ($error === ""):
            $this->_file_error = $this->_file['error'];
            else:
                $error = (new FilterInput)->getCleanInput($error);
                $this->_file_name = $error;
            endif;
        }

        /**
         * @param string $fileField
         * @return array
         */

        private function _setFile(string $fileField)
        {
            if (isset($fileField) && !empty($fileField)):
                $field = (new FilterInput)->getCleanInput($fileField);
                $this->_file = $_FILES["$field"];
                $this->setFilename();
                $this->setFileExtension();
                $this->setFileSize();
                $this->setFileError();
                $this->setFileTmpName();
            else:
                echo "Error: No file has been chosen";
                exit;
            endif;
        }
        public function getFile():array
        {
            return $this->_file;
        }
    }