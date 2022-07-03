<!--Section: Contact v.1 -->
<section class="section pb-5">

    <!--Section heading -->
    <h2 class="text-center my-5 h1 pt-4">
        <i class="fas fa-list"></i> Ajouter un Article
    </h2>
    <!--Section description -->
    <p class="text-center mb-5 w-responsive mx-auto pb-4 pl-2 pr-2">
        Bienvenue dans la page d'ajout d'article.
        Sur cette page vous pourrez ajouter des articles
        de manière facile et rapide grace à un interface épurée.
    </p>

    <?php
    if(isset($error)):
        if($error == 'none'):
            ?>
            <div class="alert alert-success alert-dismissable mt-2 mr-3 ml-3" >
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong><?= isset($message) ? $message : null ?></strong>
            </div>
        <?php
        else:
            ?>
            <div class="alert alert-danger alert-dismissable mt-2 mr-3 ml-3" >
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong><?= isset($message) ? $message : null ?></strong>
            </div>
        <?php
        endif;
    endif;
    ?>

    <div class="row">

        <!-- Grid column -->
        <div class="col-lg-12 pl-sm-5 pr-sm-5 p-2">

            <!--Form with header -->
            <div class="card card-cascade narrower mb-5 ml-3 mr-3">
                <div class="view view-cascade gradient-card-header blue-gradient">
                    <h3><i class="fas fa-list"></i> Ajout d'Article</h3>
                </div>

                <form class="card-body card-body-cascade" action="controllers/article.skt.php" method="post" enctype="multipart/form-data">
                    <!--Body -->
                    <div class="md-form">
                        <i class="fas fa-heading prefix orange-text"></i>
                        <input id="libelle" name="libelle" type="text" length="15" class="form-control">
                        <label for="libelle">Titre</label>
                    </div>
                    <div class="md-form">
                        <i class="fas fa-list-alt prefix light-blue-text"></i>
                        <input id="categorie" name="categorie" type="text" length="13" class="form-control">
                        <label for="categorie">Catégorie</label>
                    </div>
                    <div class="md-form">
                        <i class="fas fa-hashtag prefix text-info"></i>
                        <input id="codeprod" name="auteur" type="text" length="10" class="form-control">
                        <label for="codeprod">Auteur</label>
                    </div>
                    <img src="" id="imageProd" class="d-none w-75" alt="">
                    <div class="md-form pb-4" style="display: grid; grid-template-columns: repeat(2,1fr);">
                        <input type="file" name="file" class=""
                               style="display: none;" id="file-upload" />
                        <label for="file-upload" class="btn btn-sm btn-primary">
                            <i class="fa fa-image"></i>&nbsp;choisir
                        </label>
                        <input type="text" id="imgName" class="mt-4 w-100 pl-2" style="margin-left: 105px">
                    </div>
                    <div class="md-form mt-5">
                        <i class="fas fa-pen-alt prefix text-primary"></i>
                        <textarea id="description" name="contenu" class="md-textarea form-control" rows="5" length="200"></textarea>
                        <label for="description">Contenu</label>
                    </div>
                    <div class="text-center mt-4">
                        <button class="btn btn-primary" id="btnOne" type="submit" name="add">Ajouter</button>
                    </div>

                </form>

            </div>
            <!--Form with header -->

        </div>
        <!-- Grid column -->

</section>
<!--Section: Contact v.1 -->

