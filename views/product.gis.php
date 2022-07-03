<?php if (isset($row)): ?>
<div class="col-sm-6 col-md-4 col-lg-3 mb-2">
    <div class="card wow fadeIn">
    <div class="card border-light mb-2">
        <img src="<?= $row['image_produit']?>" class="card-img-top img-rounded customImage" alt="">
        <div class="card-body p-1">
        <h5 class="card-title text-center text-info"><?= $row['libelle']?></h5>
<!--        <h6 class="text-center">-->
<!--            <i class="fas fa-star"></i>-->
<!--            <i class="fas fa-star"></i>-->
<!--            <i class="fas fa-star"></i>-->
<!--            <i class="fas fa-star"></i>-->
<!--            <i class="far fa-star"></i>-->
<!--        </h6>-->
        <p class="card-text text-dark">
            <?= $row["description"] ?>
        </p>
        <h5 class="card-text text-center text-dark">
            <img src="public/img/cfa.png" width="25" height="25">
            <?= number_format($row['pu'], 2)?>
        </h5>
        <div class="card-footer p-1">
            <form action="" class="cartAddForm">
            <input type="hidden" class="pid" value="<?= $row['pid'] ?>">
            <input type="hidden" class="plib" value="<?= $row['libelle'] ?>">
            <input type="hidden" class="ppu" value="<?= $row['pu'] ?>">
            <input type="hidden" class="pimage" value="<?= $row['image_produit'] ?>">
            <input type="hidden" class="pcode" value="<?= $row['code_produit'] ?>">
            <input type="hidden" class="pcateg" value="<?= $row['categorie'] ?>">
            <button class="btn btn-blue btn-sm float-sm-none float-right addProdBtn">
                <i class="fas fa-cart-plus"></i><span class="ml-1">Ajouter</span>
            </button>
            <a href="services/item/<?= $row['pid'] ?>#show" class="btn btn-outline-elegant btn-sm float-sm-none float-left">
                <i class="fas fa-plus-square"></i><span class="ml-1">Plus</span>
            </a>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>
<?php endif; ?>
