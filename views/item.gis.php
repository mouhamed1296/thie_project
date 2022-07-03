<?php if (isset($row)) : ?>
    <div id="message"></div>
    <!--Grid row-->
    <h2 class="mt-4"><?= $row["libelle"] ?><i class="fas fa-angle-right ml-2"></i></h2>
    <hr class="mb-4">
    <div id="addMessage"></div>
    <div class="row wow fadeIn" id="show">

        <!--Grid column-->
        <div class="col-md-6 mb-4">

            <img src="<?= $row["image_produit"] ?>" class="img-fluid" alt="">

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-6 mb-4">

            <!--Content-->
            <div class="p-4">

                <div class="mb-3">
                    <a>
                        <span class="badge purple mr-1"><?= $row["categorie"] ?></span>
                    </a>
                    <?php
                    foreach ($news as $new) :
                        if (in_array($row['pid'], $new)) :
                    ?>
                            <a>
                                <span class="badge blue mr-1">Nouveau</span>
                            </a>
                    <?php
                            break;
                        endif;
                    endforeach;
                    ?>
                    <!--<a href="">
                        <span class="badge red mr-1">Bestseller</span>
                    </a>-->
                </div>

                <p class="lead">
                    <!--              <span class="mr-1">-->
                    <!--                <del>$200</del>-->
                    <!--              </span>-->
                    <span><img src="public/img/cfa.png" alt="cfa" width="25" height="25"> <?= $row["pu"] ?></span>
                </p>

                <p class="lead font-weight-bold">Description</p>

                <p><?= $row["description"] ?></p>

                <form class="d-flex justify-content-left" id="cartAddForm">
                    <!-- Default input -->
                    <input type="number" value="1" aria-label="Search" id="qte" class="form-control" style="width: 100px">
                    <input type="hidden" id="addid" value="<?= $row['pid'] ?>">
                    <input type="hidden" id="addlib" value="<?= $row['libelle'] ?>">
                    <input type="hidden" id="addimg" value="<?= $row['image_produit'] ?>">
                    <input type="hidden" id="addcateg" value="<?= $row['categorie'] ?>">
                    <input type="hidden" id="addpu" value="<?= $row['pu'] ?>">
                    <input type="hidden" id="addcode" value="<?= $row['code_produit'] ?>">
                    <button class="btn btn-primary btn-md my-0 p" id="addToCart" type="submit">Ajouter
                        <i class="fas fa-cart-plus ml-1"></i>
                    </button>

                </form>

            </div>
            <!--Content-->

        </div>
        <!--Grid column-->

    </div>
    <!--Grid row-->
    <h4 class="font-weight-bold mt-4 title-1">

        <strong>Dans la même catégorie <i class="fas fa-angle-down"></i></strong>

    </h4>

    <hr class="blue mb-5">

    <!-- Grid row -->
    <div class="row mb-3">
        <?php
        if (isset($sameCateg)) :
            foreach ($sameCateg as $same) :
                if ($same['pid'] != $row['pid']) :
        ?>
                    <!-- Grid column -->
                    <div class="col-lg-3 col-md-6 mb-4">

                        <!-- Card -->
                        <div class="card card-ecommerce">

                            <!-- Card image -->
                            <div class="view overlay">

                                <img src="<?= $same['image_produit'] ?>" class="card-img-top img-fluid customImage" alt="">

                                <a>

                                    <div class="mask rgba-white-slight"></div>

                                </a>

                            </div>
                            <!-- Card image -->

                            <!-- Card content -->
                            <div class="card-body">

                                <!-- Category & Title -->
                                <h5 class="card-title mb-1">

                                    <strong>

                                        <a href="services/item/<?= $same['pid'] ?>#show" class="dark-grey-text"><?= $same['libelle'] ?></a>

                                    </strong>

                                </h5>
                                <?php
                                foreach ($news as $new) :
                                    if (in_array($same['pid'], $new)) :
                                ?>
                                        <a>
                                            <span class="badge badge-info mb-2">Nouveau</span>
                                        </a>
                                <?php
                                        break;
                                    endif;
                                endforeach;
                                ?>
                                <!-- Card footer -->
                                <div class="card-footer pb-0">

                                    <div class="row mb-0">
                                        <span class="float-left">
                                            <strong><img src="public/img/cfa.png" alt="cfa" width="25" height="25"> <?= $same['pu'] ?></strong>
                                        </span>
                                        <form action="" class="cartAddForm">
                                            <input type="hidden" class="pid" value="<?= $same['pid'] ?>">
                                            <input type="hidden" class="plib" value="<?= $same['libelle'] ?>">
                                            <input type="hidden" class="ppu" value="<?= $same['pu'] ?>">
                                            <input type="hidden" class="pimage" value="<?= $same['image_produit'] ?>">
                                            <input type="hidden" class="pcode" value="<?= $same['code_produit'] ?>">
                                            <input type="hidden" class="pcateg" value="<?= $same['categorie'] ?>">
                                            <span class="float-right">
                                                <a class="addProdBtn text-success" data-toggle="tooltip" data-placement="top" title="Ajouter au panier">
                                                    <i class="fas fa-cart-plus ml-3"></i>
                                                </a>
                                            </span>
                                        </form>
                                    </div>

                                </div>

                            </div>
                            <!-- Card content -->

                        </div>
                        <!-- Card -->

                    </div>
                    <!-- Grid column -->
        <?php
                endif;
            endforeach;
        endif;
        ?>
    </div>
    <!-- Grid row -->

<?php endif; ?>