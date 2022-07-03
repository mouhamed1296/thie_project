<?php
    class Product {
        private string $_libelle;
        private string $_description;
        private string $_image;
        private $_price;
        private int $_stock;
        private int $_seuil;
        private string $_code;
        private string $_pub_date;
        private string $_modif_date;
        private string $_category;
        private string $_fournisseur;

        public function __construct(string $libelle, string $description, string $image, string $category, string $fournisseur, $price, int $stock, int $seuil, string $code, string $pub_date, string $modif_date = "0000-00-00")
        {
            $this->_setLibelle($libelle);
            $this->_setDescription($description);
            $this->_setImage($image);
            $this->_setPrice($price);
            $this->_setCategory($category);
            $this->_setFournisseur($fournisseur);
            $this->_setStock($stock);
            $this->_setSeuil($seuil);
            $this->_setCode($code);
            $this->_setPubDate($pub_date);
            $this->_setModifDate($modif_date);
        }
        /* Getters */
        public function getLibelle() :string
        {
            return $this->_libelle;
        }

        public function getDescription() :string
        {
            return $this->_description;
        }

        public function getImage() :string
        {
            return $this->_image;
        }

        public function getPrice()
        {
            return $this->_price;
        }

        public function getCategory() :string
        {
            return $this->_category;
        }

        public function getFournisseur() :string
        {
            return $this->_fournisseur;
        }

        public function getStock() :int
        {
            return $this->_stock;
        }
        
        public function getSeuil() :int
        {
            return $this->_seuil;
        }

        public function getCode() :string
        {
            return $this->_code;
        }

        public function getPubDate() :string
        {
            return $this->_pub_date;
        }

        public function getModifDate() :string
        {
            return $this->_modif_date;
        }
        
        /* Setters */

        private function _setLibelle(string $libelle) :void
        {
            if (is_string($libelle)):
                $this->_libelle = $libelle;
            else:
                echo "please enter a string inside the libelle field";
            endif;
        }

        private function _setDescription(string $description) :void
        {
            if (is_string($description)):
                $this->_description = $description;
            else:
                echo "please enter a string inside the description field";
            endif;
        }

        private function _setImage(string $image) :void
        {
            if (is_string($image)) :
                $this->_image = $image;
            else:
                echo "please enter a string inside the image field";
            endif;
        }

        private function _setPrice($price) :void
        {
            $this->_price = $price;
        }

        private function _setStock(int $stock) :void
        {
            $this->_stock = $stock;
        }

         private function _setCategory(string $category) :void
        {
            $this->_category = $category;
        }

         private function _setFournisseur(string $fournisseur) :void
        {
            $this->_fournisseur = $fournisseur;
        }
        
        private function _setSeuil(int $seuil) :void
        {
            $this->_seuil = $seuil;
        }

        private function _setCode (string $code) :void
        {
            $this->_code = $code;
        }

        private function _setPubDate (string $pub_date) :void
        {
            $this->_pub_date = $pub_date;
        }

        private function _setModifDate (string $modif_date) :void
        {
           $this->_modif_date = $modif_date;
        }

    }