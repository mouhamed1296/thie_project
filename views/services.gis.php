    <div class="container">
        <h2 class="my-5 h2 text-center"><i class="fas fa-cogs mr-2"></i>NOS SERVICES</h2>
        <h6 class="mt-2" id="products">PRODUITS <i class="fas fa-angle-right"></i></h6>
        <hr>
        <div id="message"></div>
        <div class="row mt-2" id="productItems"></div>
        <button class="btn btn-info mb-2 mt-2 w-50" style="margin-left: 25%;"><i class="fas fa-plus-circle"> PLUS</i></button>
        <?php
            if (isset($news)):
        ?>
        <!--Section: Products v.5-->
        <section class="section pb-3 wow fadeIn" data-wow-delay="0.3s">

            <!--Section heading-->
            <h1 class="font-weight-bold text-center h1 my-5">Nouveautés</h1>
            <!--Section description-->
            <p class="text-center grey-text mb-5 mx-auto w-responsive">
                Admirez Nos nouveautés, des produits haut de gamme rien que
                pour vous.Un bon rapport qualité prix pour vous offrir , chers clients
                le meilleur des services.
            </p>

            <!--Carousel Wrapper-->
            <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

                <!--Controls-->
                <div class="controls-top">
                    <a class="btn-floating primary-color" href="#multi-item-example" data-slide="prev">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    <a class="btn-floating primary-color" href="#multi-item-example" data-slide="next">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </div>
                <!--Controls-->

                <!--Indicators-->
                <ol class="carousel-indicators">
                    <li class="primary-color active" data-target="#multi-item-example" data-slide-to="0"></li>
                    <li class="primary-color" data-target="#multi-item-example" data-slide-to="1"></li>
                    <li class="primary-color" data-target="#multi-item-example" data-slide-to="2"></li>
                </ol>
                <!--Indicators-->

                <!--Slides-->
                <div class="carousel-inner" role="listbox">
                <?php
                    $i = 0;
                    $n = count($news);
                    while ($i < $n):
                ?>
                    <!--First slide-->
                    <div class="carousel-item <?= ($i == 0) ? 'active' : null ?>">
                        <div class="col-md-4">

                            <!--Card-->
                            <div class="card card-cascade narrower card-ecommerce mb-5">

                                <!--Card image-->
                                <div class="view view-cascade overlay">
                                    <img src="<?= $news[$i]['image_produit'] ?>" class="card-img-top customImage"
                                         alt="">
                                    <a>
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                                <!--Card image-->

                                <!--Card content-->
                                <div class="card-body card-body-cascade text-center no-padding">
                                    <!--Category & Title-->
                                    <a href="" class="text-muted">
                                        <h5><?= $news[$i]['libelle'] ?></h5>
                                    </a>
                                    <h4 class="card-title">
                                        <strong>
                                            <a href=""><?= $news[$i]['categorie'] ?></a>
                                        </strong>
                                    </h4>

                                    <!--Description-->
                                    <p class="card-text"><?= $news[$i]['description'] ?></p>

                                    <!--Card footer-->
                                    <div class="card-footer">
                                        <span class="float-left"><img src="public/img/cfa.png" width="25" height="25"> <?= $news[$i]['pu'] ?></span>
                                        <span class="float-right">
                                            <a href="services/item/<?= $news[$i]['pid'] ?>#show" class="" data-toggle="tooltip" data-placement="top" title="Voir">
                                              <i class="fas fa-eye"></i>
                                            </a>
                                            <a class="" data-toggle="tooltip" data-placement="top" title="Aimer">
                                              <i class="fas fa-heart"></i>
                                            </a>
                                        </span>
                                    </div>

                                </div>
                                <!--Card content-->

                            </div>
                            <!--Card-->

                        </div>
                        <div class="col-md-4 clearfix d-none d-sm-block">

                            <!--Card-->
                            <div class="card card-cascade narrower card-ecommerce mb-5">

                                <!--Card image-->
                                <div class="view view-cascade overlay">
                                    <img src="<?= $news[$i+1]['image_produit'] ?>" class="card-img-top customImage"
                                         alt="">
                                    <a>
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                                <!--Card image-->

                                <!--Card content-->
                                <div class="card-body card-body-cascade text-center no-padding">
                                    <!--Category & Title-->
                                    <a href="" class="text-muted">
                                        <h5><?= $news[$i+1]['libelle'] ?></h5>
                                    </a>
                                    <h4 class="card-title">
                                        <strong>
                                            <a href=""><?= $news[$i+1]['categorie'] ?></a>
                                        </strong>
                                    </h4>

                                    <!--Description-->
                                    <p class="card-text"><?= $news[$i+1]['description'] ?></p>

                                    <!--Card footer-->
                                    <div class="card-footer">
                                        <span class="float-left"><img src="public/img/cfa.png" width="25" height="25"> <?= $news[$i+1]['pu'] ?></span>
                                        <span class="float-right">
                                            <a href="services/item/<?= $news[$i+1]['pid'] ?>#show" class="" data-toggle="tooltip" data-placement="top" title="Voir">
                                              <i class="fas fa-eye"></i>
                                            </a>
                                            <a class="" data-toggle="tooltip" data-placement="top" title="Aimer">
                                              <i class="fas fa-heart"></i>
                                            </a>
                                        </span>
                                    </div>

                                </div>
                                <!--Card content-->

                            </div>
                            <!--Card-->

                        </div>
                        <div class="col-md-4 clearfix d-none d-sm-block ">

                            <!--Card-->
                            <div class="card card-cascade narrower card-ecommerce">

                                <!--Card image-->
                                <div class="view view-cascade overlay">
                                    <img src="<?= $news[$i+2]['image_produit'] ?>" class="card-img-top customImage" alt="">
                                    <a>
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                                <!--Card image-->

                                <!--Card content-->
                                <div class="card-body card-body-cascade text-center no-padding">
                                    <!--Category & Title-->
                                    <a href="" class="text-muted">
                                        <h5><?= $news[$i+2]['libelle'] ?></h5>
                                    </a>
                                    <h4 class="card-title">
                                        <strong>
                                            <a href=""><?= $news[$i+2]['categorie'] ?></a>
                                        </strong>
                                    </h4>

                                    <!--Description-->
                                    <p class="card-text"><?= $news[$i+2]['description'] ?></p>

                                    <!--Card footer-->
                                    <div class="card-footer">
                                        <span class="float-left"><img src="public/img/cfa.png" width="25" height="25"> <?= $news[$i+2]['pu'] ?></span>
                                        <span class="float-right">
                                            <a href="services/item/<?= $news[$i+2]['pid'] ?>#show" class="" data-toggle="tooltip" data-placement="top" title="Voir">
                                              <i class="fas fa-eye"></i>
                                            </a>
                                            <a class="" data-toggle="tooltip" data-placement="top" title="Aimer">
                                              <i class="fas fa-heart"></i>
                                            </a>
                                        </span>
                                    </div>

                                </div>
                                <!--Card content-->

                            </div>
                            <!--Card-->
                        </div>
                    </div>
                    <!--First slide-->
                    <?php
                            $i+=3;
                        endwhile;
                    ?>
                </div>
                <!--Slides-->

            </div>
            <!--Carousel Wrapper-->

        </section>
        <!--Section: Products v.5-->
        <?php
            endif;
        ?>
        <h6 class="mt-2">CONSEILS <i class="fas fa-angle-right"></i></h6>
        <hr>
        <!--Section heading-->
        <h2 class="font-weight-bold text-center h1 my-5">Articles récents</h2>
        <!--Section description-->
        <p class="text-center grey-text mb-5 mx-auto w-responsive">Duis aute irure dolor in reprehenderit in voluptate
            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
            culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <div class="row mb-2" id="conseils">
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 text-primary">Outils</strong>
                        <h3 class="mb-0">
                            <a class="text-dark" href="#">Featured post</a>
                        </h3>
                        <div class="mb-1 text-muted">Nov 12</div>
                        <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                        <a href="#">Lire plus</a>
                    </div>
                    <img class="card-img-right flex-auto d-none d-md-block" width="50%" src="public/img/showcasef.jpg" alt="Card image cap">
                </div>
            </div>
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 text-success">Sanitaires</strong>
                        <h3 class="mb-0">
                            <a class="text-dark" href="#">Post title</a>
                        </h3>
                        <div class="mb-1 text-muted">Nov 11</div>
                        <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                        <a href="#">Lire plus</a>
                    </div>
                    <img class="card-img-right flex-auto d-none d-md-block" width="50%" src="public/img/showcasef.jpg" alt="Card image cap">
                </div>
            </div>
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 text-danger">Tuyauterie</strong>
                        <h3 class="mb-0">
                            <a class="text-dark" href="#">Post title</a>
                        </h3>
                        <div class="mb-1 text-muted">Nov 11</div>
                        <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                        <a href="#">Lire plus</a>
                    </div>
                    <img class="card-img-right flex-auto d-none d-md-block" width="50%" src="public/img/showcasef.jpg" alt="Card image cap">
                </div>
            </div>
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 box-shadow h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 text-info">Plan</strong>
                        <h3 class="mb-0">
                            <a class="text-dark" href="#">Post title</a>
                        </h3>
                        <div class="mb-1 text-muted">Nov 11</div>
                        <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                        <a href="#">Lire plus</a>
                    </div>
                    <img class="card-img-right flex-auto d-none d-md-block" width="50%" src="public/img/showcasef.jpg" alt="Card image cap">
                </div>
            </div>
        </div>
        <button class="btn btn-info mb-2 w-50" style="margin-left: 25%;"><i class="fas fa-plus-circle"> PLUS</i></button>
        <h6 class="mt-4">CONSTRUCTION <i class="fas fa-angle-right"></i></h6>
        <hr>
        <div id="build">
            <!--Section: Blog v.3-->
            <section class="section extra-margins pb-3 text-center text-lg-left wow fadeIn" data-wow-delay="0.3s">

                <!--Section heading-->
                <h2 class="font-weight-bold text-center h1 my-5">Articles récents</h2>
                <!--Section description-->
                <p class="text-center grey-text mb-5 mx-auto w-responsive">Duis aute irure dolor in reprehenderit in voluptate
                    velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                    culpa qui officia deserunt mollit anim id est laborum.</p>

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-lg-4 mb-4">
                        <!--Featured image-->
                        <div class="view overlay z-depth-1">
                            <img src="public/img/showcasef.jpg" class="img-fluid" alt="First sample image">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-7 mb-4">
                        <!--Excerpt-->
                        <a href="" class="teal-text">
                            <h6 class="pb-1"><i class="fas fa-heart"></i><strong> Lifestyle </strong></h6>
                        </a>
                        <h4 class="mb-4"><strong>This is title of the news</strong></h4>
                        <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime
                            placeat facere possimus, omnis voluptas assumenda est, omnis dolor.</p>
                        <p>by <a><strong>Jessica Clark</strong></a>, 26/08/2016</p>
                        <a class="btn btn-primary">Read more</a>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <hr class="mb-5">

                <!--Grid row-->
                <div class="row mt-3">

                    <!--Grid column-->
                    <div class="col-lg-4 mb-4">
                        <!--Featured image-->
                        <div class="view overlay z-depth-1">
                            <img src="public/img/showcasef.jpg" class="img-fluid" alt="Second sample image">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-7 mb-4">
                        <!--Excerpt-->
                        <a href="" class="cyan-text">
                            <h6 class="pb-1"><i class="fas fa-plane"></i><strong> Travels</strong></h6>
                        </a>
                        <h4 class="mb-4"><strong>This is title of the news</strong></h4>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
                            deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati.</p>
                        <p>by <a><strong>Jessica Clark</strong></a>, 24/08/2016</p>
                        <a class="btn btn-primary">Read more</a>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <hr class="mb-5">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-lg-4 mb-4">
                        <!--Featured image-->
                        <div class="view overlay z-depth-1">
                            <img src="public/img/showcase o.jpg" class="img-fluid" alt="Third sample image">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-7 mb-4">
                        <!--Excerpt-->
                        <a href="" class="brown-text">
                            <h6 class="pb-1"><i class="fas fa-camera"></i><strong> Photography</strong></h6>
                        </a>
                        <h4 class="mb-4"><strong>This is title of the news</strong></h4>
                        <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni
                            dolores eos qui ratione voluptatem sequi nesciunt.</p>
                        <p>by <a><strong>Jessica Clark</strong></a>, 21/08/2016</p>
                        <a class="btn btn-primary">Read more</a>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <hr class="mb-5">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-lg-4 mb-4">
                        <!--Featured image-->
                        <div class="view overlay z-depth-1">
                            <img src="public/img/showcasef.jpg" class="img-fluid" alt="Third sample image">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-7 mb-4">
                        <!--Excerpt-->
                        <a href="" class="red-text">
                            <h6 class="pb-1"><i class="fas fa-heart"></i><strong> Lifestyle</strong></h6>
                        </a>
                        <h4 class="mb-4"><strong>This is title of the news</strong></h4>
                        <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni
                            dolores eos qui ratione voluptatem sequi nesciunt.</p>
                        <p>by <a><strong>Jessica Clark</strong></a>, 21/08/2016</p>
                        <a class="btn btn-primary">Read more</a>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Pagination dark-->
                <nav class="wow fadeIn mb-4 mt-5" data-wow-delay="0.4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeIn;">
                    <ul class="pagination pg-dark flex-center">
                        <!--Arrow left-->
                        <li class="page-item">
                            <a class="page-link waves-effect waves-effect" aria-label="Previous">
                                <span aria-hidden="true">«</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>

                        <!--Numbers-->
                        <li class="page-item active"><a class="page-link waves-effect waves-effect">1</a></li>
                        <li class="page-item"><a class="page-link waves-effect waves-effect">2</a></li>
                        <li class="page-item"><a class="page-link waves-effect waves-effect">3</a></li>
                        <li class="page-item"><a class="page-link waves-effect waves-effect">4</a></li>
                        <li class="page-item"><a class="page-link waves-effect waves-effect">5</a></li>

                        <!--Arrow right-->
                        <li class="page-item">
                            <a class="page-link waves-effect waves-effect" aria-label="Next">
                                <span aria-hidden="true">»</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!--/Pagination dark-->

            </section>
            <!--Section: Blog v.3-->

            <hr class="mb-5">
        </div>
    </div>



    <!--    <div class="mycart-overlay">
        <div class="mycart bg-light">
            <span class="close-mycart">
                <i class="fas fa-window-close"></i>
            </span>
            <h2>Votre panier</h2>
            <div class="mycart-content">
             Cart Item
                <div class="mycart-item">
                    <img src="uploads/camera.jpg" alt="produits"/>
                    <div>
                        <h4>NOM Produit</h4>
                        <h5>$ 9.00</h5>
                        <span class="remove-item text-danger">supprimer</span>
                    </div>
                    <div>
                        <i class="fas fa-chevron-up"></i>
                        <p class="item-amount">1</p>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
                <div class="mycart-footer">
                    <h3>Votre Total: $ <span class="mycart-total">0</span></h3>
                    <button class="clear-mycart btn btn-danger btn-sm float-left">
                        <i class="fas fa-trash-alt"> Vider Panier</i>
                    </button>
                    <button class="btn btn-success btn-sm float-right">
                        <i class="fas fa-money-bill"> Commander</i>
                    </button>
                </div>
            </div>
        </div>
    </div>-->