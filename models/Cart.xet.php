<?php
class Cart
{
    private $_filter;
    public $cartSessionItemCount = 0;

    function __construct()
    {
        if (! empty($_SESSION["cart_item"]) && is_array($_SESSION["cart_item"])) {
            $this->cartSessionItemCount = count($_SESSION["cart_item"]);
        }
    }

    function addToCart(int $id,string $cart_code, string $libelle, int $prix_unitaire, string $image_produit, int $qte, string $prix_total, string $code_produit, string $categ)
    {

        $cartItem = array(
            'id' => $id,
            'code_panier' => $cart_code,
            'libelle' => $libelle,
            'pu' => $prix_unitaire,
            'image_produit' => $image_produit,
            'qte' => $qte,
            'prix' => $prix_total,
            'code_produit' =>$code_produit,
            'categorie' => $categ
        );

        $_SESSION["cart_item"][$id] = $cartItem;
        if (! empty($_SESSION["cart_item"]) && is_array($_SESSION["cart_item"])) {
            $this->cartSessionItemCount = count($_SESSION["cart_item"]);
        }
    }

    function editCart()
    {

        if (! empty($_SESSION["cart_item"])) {
            foreach ($_SESSION["cart_item"] as $k => $v) {
                if ($_POST["prodid"] == $k) {
                    $this->_filter = new FilterInput();
                    $_SESSION["cart_item"][$k]["qte"] = $this->_filter->getCleanInput($_POST["qty"]);
                }
                $_SESSION['cart_item'][$k]['prix'] = $_SESSION["cart_item"][$k]["qte"] * $_SESSION["cart_item"][$k]["pu"];
            }
        }

        if (! empty($_SESSION["cart_item"]) && is_array($_SESSION["cart_item"])) {
            $this->cartSessionItemCount = count($_SESSION["cart_item"]);
        }
    }

    function removeFromCart()
    {
        if (! empty($_SESSION["cart_item"])) {
            foreach ($_SESSION["cart_item"] as $k => $v) {
                $this->_filter = new FilterInput();
                $id = $this->_filter->getCleanInput($_POST['id']);
                if ($id == $k)
                    unset($_SESSION["cart_item"][$k]);
                if (empty($_SESSION["cart_item"]))
                    unset($_SESSION["cart_item"]);
            }
        }

        if (! empty($_SESSION["cart_item"]) && is_array($_SESSION["cart_item"])) {
            $this->cartSessionItemCount = count($_SESSION["cart_item"]);
        }
    }

    function emptyCart()
    {
        unset($_SESSION["cart_item"]);
        $this->cartSessionItemCount = 0;
    }
}
