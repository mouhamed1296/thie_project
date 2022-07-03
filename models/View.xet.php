<?php 
    class View 
    {
        private static string $_pageLocation = "home";

        /**
         * Cette méthode permet d'indexer la vue correspondant à la requête passée en paramètre
         *
         * @param string $request
         * @return void
         */
        public static function index (string $request)
        {

        }

        /**
         * Cette fonction permet de retourner à l'utilisateur la vue orrespondant à sa requête 
         *
         * @return void
         */
        public static function render () 
        {
            if (self::$_pageLocation !== ""):
                Locate::To(self::$_pageLocation);
            else:
                Locate::To("acceuil");
            endif;
        }
        public static function redirect (string $page, string $error="", string $message="")
        {
            if ($error === "" && $message === ""):
                Locate::To($page);
            else:
                (new HandleError())::setErrorMessage($error, $message);
                Locate::To($page);
            endif;
        }
    }