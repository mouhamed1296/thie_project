<?php
    class FileUpload
    {
        private const MAX_FILE_SIZE = 2097152;
        private const TOO_BIG_FILE = 12;
        private const TOO_SMALL_FILE = 11;
        private const NOT_ALLOWED_EXT = 10;
        private array $_allowed_extension = ["jpg", "png", "pdf"];
        private string $_tmp_name;
        
        public function __construct(string $tmp_name = "")
        {
            $this->_tmp_name = $tmp_name;
        }

        /**
         * Cette fonction permet de verifier que le fichier a été transmis sans aucune erreur
         *Elle prend en paramètre l'objet fichier (de type File)

         * @param File $file
         * @return int|FileUpload le statut du test effectué sur le fichier s'il y'a erreur
         * ou le fichier s'il n'y a pas d'erreur
         */
        public static function getUploadedFile (File $file)
        {
            if (is_object($file) && ($file instanceof File)):
                $name = $file->getFileName();
                $ext = $file->getFileExtension();
                $size = $file->getFileSize();
                $error = $file->getFileError();
                $tmp_name = $file->getFileTmpName();
                if (is_string($name)):
                    if ($error === 0):
                        if (in_array($ext, (new FileUpload)->_allowed_extension)):
                            if ($size > 0):
                                if ($size < self::MAX_FILE_SIZE):
                                    return new FileUpload($tmp_name);
                                else:
                                    $error = self::TOO_BIG_FILE;
                                    return $error;
                                endif;
                            else:
                                $error = self::TOO_SMALL_FILE;
                                return $error;
                            endif;
                        else:
                            $error = self::NOT_ALLOWED_EXT;
                            return $error;
                        endif;
                    else:
                        return $error;
                    endif;
                endif;
            else:
                echo "Argument passed to the method getUploadedFile is not an object";
            endif;
        }

        /**
         * Cette fonction permet de procéder au téléchargement du fichier dans un dossier à spécifier
         *Elle prend en paramètre une chaine de caractère représentant 
         le répertoire ou doit être enregistré le fichier.
         * 
         * @param string $uploads_directory
         * @return void
         */
        public static function moveUploadedFile(FileUpload $file,string $uploads_path):void
        {
            if (is_object($file) && ($file instanceof FileUpload)):
                move_uploaded_file($file->_tmp_name, $uploads_path);
            else:
                echo "An Error Has occured when moving the file.Upload fail please retry";
            endif;
        }

        /**
         * Cette fonction permet d'autoriser une extension 
         * 
         * @param string $ext
         */

        public function allowExtension(string $ext):void
        {
            $this->_allowed_extension = $ext;
        }

        /**
         * Cette fonction permet d'interdire une extension 
         * 
         * @param string $ext
         */

        public function denyExtension(string $ext):void
        {
            if (in_array($ext, $this->_allowed_extension)):
            endif;
        }

        /**
         * Cette fonction permet d'autoriser plusieurs extensions 
         * 
         * @param array $exts
         */

        public function allowExtensions(array $exts):void
        {

        }
        /**
         * Cette fonction permet d'interdire plusieurs extensions 
         * 
         * @param array $exts
         */

        public function denyExtensions(array $exts):void
        {

        }
    }
    