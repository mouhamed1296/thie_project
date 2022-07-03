<!-- Heading -->
<h2 class="my-5 h2 text-center"><i class="fas fa-funnel-dollar mr-2"></i>VOS ACHATS</h2>
<div class="container">
    <div class="alert alert-success alert-dismissable mt-2"
    style="display: <?php echo (isset($_SESSION['showAlert'])) ? $_SESSION['showAlert'] : 'none'; unset($_SESSION['showAlert']); ?>">
        <button type="button" class="close" data-dismiss="alert">&timesbar;</button>
        <strong>
            <?php echo (isset($_SESSION['message'])) ? $_SESSION['message'] : null; unset($_SESSION['message']); ?>
        </strong>
    </div>
    <?php
    if(isset($error)):
        if($error == 'none'):
            ?>
            <div class="alert alert-success alert-dismissable mt-2" >
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong><?= isset($message) ? $message : '' ?></strong>
            </div>
        <?php
        else:
            ?>
            <div class="alert alert-danger alert-dismissable mt-2" >
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong><?= isset($message) ? $message : '' ?></strong>
            </div>
        <?php
        endif;
    endif;
    $items = $cart->cartSessionItemCount;
    if ($items > 0):
    ?>
<div class="row justify-content-center mb-4">
<div class="col-lg-10">
    <div id="deleteResponse"></div>
    <div class="table-responsive mt-2">
        <table class="table table-bordered table-striped text-center bg-white z-depth-1">
        <thead>
        <tr>
            <th colspan="7">
            <h4 class="text-center text-primary m-0">Produits dans votre panier</h4>
            </th>
        </tr>
        <tr>
            <th>Image</th>
            <th>Produit</th>
            <th>Prix</th>
            <th>Quantité</th>
            <th >Prix Total</th>
            <th>
            <a href="controllers/command.skt.php?clear=<?= $_SESSION["cart_code"] ?>" class="badge badge-danger p-2
            <?= (isset($grand_total) && ($grand_total)) == 0 ? "" : "disabled"; ?>"
            onclick="return confirm('Êtes vous sûr de vouloir vider votre panier?');" >
                <i class="fas fa-trash"></i>
                &nbsp;vider le panier
            </a>
            </th>
        </tr>
        </thead>
        <tbody>
            <?php
            $grand_total = 0;
            if(isset($results)):
                foreach ($results as $result) :
            ?>
            <tr>
            <td class="d-none">
                <?= $result["id"] ?>
                <input type="hidden" class="prodid" value=" <?= $result["id"] ?>">
            </td>
            <td>
                <img src="<?= $result["image_produit"] ?>" width="50">
            </td>
            <td>
                <?= $result["libelle"] ?>
            </td>
            <td>
                <img src="public/img/cfa.png" width="25" height="25">
                <?= number_format($result["pu"], 2) ?>
                <input type="hidden" class="prodprice" value=" <?= number_format($result["pu"], 2) ?>">
            </td>
            <td>
                <input type="number" class="form-control itemQty" 
                value="<?= $result["qte"] ?>" style="width: 75px;">
            </td>
            <td>
                <img src="public/img/cfa.png" width="25" height="25">
                <?= number_format($result["prix"], 2) ?>
            </td>
            <td>
                <a id="del_<?= $result["id"] ?>"
                class="delete text-danger">
                <i class="fa fa-trash-alt"></i>
                </a>
            </td>
            </tr>
            <?php $grand_total += $result["prix"]; ?>
            <?php
                    endforeach;
                else:
                    echo "<tr><td colspan='6' class='text-info'><i class='fas fa-shopping-cart mr-2'></i> Panier Vide!!!</td></tr>";
            ?>
            <?php
                endif;
            ?>
            <tr>
            <td colspan="2">
                <a  href="services#productItems" class="btn btn-success btn-sm">
                <i class="fas fa-cart-plus"></i>
                ajouter produits
                </a>
            </td>
            <td colspan="2">
                <b>Grand Total</b>
            </td>
            <td>
                <img src="public/img/cfa.png" width="25" height="25">
                <b><?= number_format($grand_total, 2); ?></b>
            </td>
            <td>
                <a href="panier#cart-final" class="btn btn-primary btn-sm <?= ($grand_total)>1 ? "" : "disabled"; ?>">
                <i class="fas fa-credit-card"></i>
                caisse
                </a>
            </td>
            </tr>
        </tbody>
        </table>
    </div>
    </div>
</div>
<?php
        if(isset($results)):
?>
    <!--Grid row-->
    <div class="row" id="cart-final">

        <!--Grid column-->
        <div class="col-md-4 mb-4">

            <!-- Heading -->
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Votre Panier</span>
                <span class="badge badge-danger badge-pill" id="cart-item"></span>
            </h4>

            <!-- Cart -->
            <ul class="list-group mb-3 z-depth-1">
                <?php foreach ($results as $result): ?>
                    <li class="list-group-item d-flex justify-content-between lh-condensed bg-white">
                        <div>
                            <h6 class="my-0"><?= $result["libelle"] ?></h6>
                            <small class="text-muted">Briève description</small>
                        </div>
                        <span class="text-muted">
                    <img src="public/img/cfa.png" width="25" height="25">
                    <?= $result["prix"] ?>
                </span>
                    </li>
                <?php endforeach; ?>
                <li class="list-group-item d-flex justify-content-between bg-light">
                    <div class="text-success">
                        <h6 class="my-0">Promo code</h6>
                        <small>EXAMPLECODE</small>
                    </div>
                    <span class="text-success"><img src="public/img/cfa.png" width="25" height="25"> -5</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (cfa)</span>
                    <strong>
                        <img src="public/img/cfa.png" width="25" height="25">
                        <?= number_format($grand_total, 2); ?>
                    </strong>
                </li>
            </ul>
            <!-- Cart -->

            <!-- Promo code -->
            <form class="card p-2">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Promo code" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-blue btn-md waves-effect m-0" type="button">Reduire</button>
                    </div>
                </div>
            </form>
            <!-- Promo code -->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-8 mb-4">

            <!--Card-->
            <div class="card">

                <!--Card content-->
                <form class="card-body" method="post" action="controllers/command.skt.php">

                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-md-6 mb-2">

                            <!--firstName-->
                            <div class="md-form ">
                                <input type="text" id="firstName" name="firstname" class="form-control">
                                <input type="text" class="d-none" name="total" value="<?= number_format($grand_total, 2); ?>">
                                <label for="firstName" class="">Nom</label>
                            </div>

                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-md-6 mb-2">

                            <!--lastName-->
                            <div class="md-form">
                                <input type="text" id="lastName" name="lastname" class="form-control">
                                <label for="lastName" class="">Prénom</label>
                            </div>

                        </div>
                        <!--Grid column-->

                    </div>
                    <!--Grid row-->

                    <!--Username-->
                    <!--                    <div class="md-form input-group pl-0 mb-5">-->
                    <!--                        <div class="input-group-prepend">-->
                    <!--                            <span class="input-group-text" id="basic-addon1">@</span>-->
                    <!--                        </div>-->
                    <!--                        <input type="text" class="form-control py-0" placeholder="Username" aria-describedby="basic-addon1">-->
                    <!--                    </div>-->

                    <!--email-->
                    <div class="md-form mb-5">
                        <input type="tel" id="tel" name="tel" class="form-control" placeholder="votre numero de telephone">
                        <label for="tel" class="">Tel</label>
                    </div>

                    <!--address-->
                    <div class="md-form mb-5">
                        <input type="text" id="address" name="adresse" class="form-control" placeholder="Medina rue10">
                        <label for="address" class="">Addresse</label>
                    </div>

                    <!--address-2-->
                    <div class="md-form mb-5">
                        <input type="text" id="address-2" name="addliv" class="form-control" placeholder="Adresse de livraison ">
                        <label for="address-2" class="">Address 2 </label>
                    </div>

                    <!--Grid row-->
                    <div class="row">

                        <!--Grid column-->
                        <div class="col-lg-4 col-md-12 mb-4">

                            <label for="country">Région</label>
                            <select class="custom-select d-block w-100" id="country" name="region">
                                <option value="">Choisissez...</option>
                                <option value="dakar">Dakar</option>
                                <option value="thies">Thies</option>
                                <option value="diourbel">Diourbel</option>
                                <option value="st louis">St Louis</option>
                                <option value="fatick">Fatick</option>
                                <option value="kaolack">Kaolack</option>
                                <option value="kaffrine">Kaffrine</option>
                                <option value="matam">Matam</option>
                                <option value="sedhiou">Sedhiou</option>
                                <option value="tambacounda">Tambacounda</option>
                                <option value="kedougou">Kedougou</option>
                                <option value="louga">Louga</option>
                                <option value="ziguinchor">Ziguinchor</option>
                                <option value="kolda">Kolda</option>
                            </select>
                            <div class="invalid-feedback">
                                Selectionnez une région valide SVP!!
                            </div>

                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-lg-4 col-md-6 mb-4">

                            <label for="state">Ville ou Département</label>
                            <select class="custom-select d-block w-100" id="state" name="depart_ville">
                                <option value="">Chosissez...</option>
                                <option value="Pikine">Pikine</option>
                            </select>
                            <div class="invalid-feedback">
                                Selectionnez une ville ou un département valide SVP!!
                            </div>

                        </div>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->

<!--                    <hr>-->

<!--                    <div class="custom-control custom-checkbox">-->
<!--                        <input type="checkbox" class="custom-control-input" id="same-address">-->
<!--                        <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>-->
<!--                    </div>-->
<!--                    <div class="custom-control custom-checkbox">-->
<!--                        <input type="checkbox" class="custom-control-input" id="save-info">-->
<!--                        <label class="custom-control-label" for="save-info">Save this information for next time</label>-->
<!--                    </div>-->

                    <hr class="mb-4">
                    <button class="btn btn-blue btn-lg btn-block" name="confirm" type="submit">Confirmez Commande</button>

                </form>

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->

    </div>
    <!--Grid row-->

</div>

<?php
        endif;
    else:
        echo "<h5 class='text-muted mx-5'>
                <i class='fas fa-4x fa-shopping-cart'></i>
                <p>Votre Panier est vide !!! Veuillez faire des achats pour le remplir</p>
             </h5>";
    endif;
?>

