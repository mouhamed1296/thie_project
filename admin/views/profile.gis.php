<!-- Main layout -->
<main>
    <div class="container-fluid">

        <!-- Section: Edit Account -->
        <section class="section">
            <!-- First row -->
            <div class="row">
<!--                 First column -->
<!--                <div class="col-lg-4 mb-4">-->
<!---->
<!--                     Card --
                   <div class="card card-cascade narrower">-->
<!--                         Card image -->
<!--                        <div class="view view-cascade gradient-card-header mdb-color lighten-3">-->
<!--                            <h5 class="mb-0 font-weight-bold">Edit Photo</h5>-->
<!--                        </div>-->
<!--                        Card image -->
<!---->
<!--                        <Card content -->
<!--                        <div class="card-body card-body-cascade text-center">-->
<!--                            <form class="md-form" action="controllers/update_img.skt.php" enctype="multipart/form-data">-->
<!--                                <div class="file-field">-->
<!--                                    <div class="z-depth-1-half mb-4">-->
<!--                                        <img src="../public/img/showcasef.jpg" class="img-fluid" alt="example placeholder">-->
<!--                                    </div>-->
<!--                                    <a class="btn-floating blue-gradient mt-0 float-left">-->
<!--                                        <i class="fas fa-paperclip" aria-hidden="true"></i>-->
<!--                                        <input type="file" name="profile">-->
<!--                                    </a>-->
<!--                                    <div class="file-path-wrapper">-->
<!--                                        <input class="file-path validate" type="text" placeholder="charger votre fichier">-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <button class="btn blue-gradient btn-rounded mt-3" name="update_profile" type="submit">-->
<!--                                    <i class="fas fa-user-edit"></i> Editer-->
<!--                                </button>-->
<!--                            </form>-->
<!--                        </div>-->
<!--                         Card content -->
<!---->
<!--                    </div>-->
<!--                     Card -->
<!---->
<!--                </div>-->
<!--                First column -->

                <!-- Second column -->
                <div class="col-lg-12 mb-4 mt-4">

                    <!-- Card -->
                    <div class="card card-cascade narrower">

                        <!-- Card image -->
                        <div class="view view-cascade gradient-card-header mdb-color lighten-3">
                            <h5 class="mb-0 font-weight-bold">Modifier mes infos de connexion</h5>
                        </div>
                        <!-- Card image -->

                        <!-- Card content -->
                        <div class="card-body card-body-cascade text-center">

                            <!-- Edit Form -->
                            <form action="controllers/profile.skt.php" method="post">
                                <!-- First row -->
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
                                ?>
                                <div class="row">

                                    <!-- First column -->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" id="form1" class="form-control validate" value="ETHIC-SA" disabled>
                                            <label for="form1" data-error="wrong" data-success="right">Entreprise</label>
                                        </div>
                                    </div>
                                    <!-- Second column -->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" name="username" id="form2" class="form-control validate">
                                            <label for="form2" data-error="wrong" data-success="right">Pseudo</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- First row -->

                                <!-- First row -->
                                <div class="row">
                                    <!-- First column -->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" name="prenom" id="form81" class="form-control validate">
                                            <label for="form81" data-error="wrong" data-success="right">Prénom</label>
                                        </div>
                                    </div>

                                    <!-- Second column -->
                                    <div class="col-md-6">
                                        <div class="md-form mb-0">
                                            <input type="text" name="nom" id="form82" class="form-control validate">
                                            <label for="form82" data-error="wrong" data-success="right">Nom</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- First row -->

                                <!-- Second row -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="md-form mb-0">
                                            <input type="email" name="email" id="form76" class="form-control validate">
                                            <label for="form76">Email</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Second row -->

                                <!-- Third row -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="md-form mb-0">
                                            <input type="password" name="password" id="form77" class="form-control validate">
                                            <label for="form77">Mot de passe actuel</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="md-form mb-0">
                                            <input type="password" name="newpassword" id="form78" class="form-control validate">
                                            <label for="form78">Nouveau </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="md-form mb-0">
                                            <input type="password" name="confirmpassword" id="form79" class="form-control validate">
                                            <label for="form79">Confirmer </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Third row -->

                                <!-- Fourth row -->
                                <div class="row">
                                    <div class="col-md-12 text-center my-4">
                                        <button class="btn btn-info btn-rounded" type="submit" name="update">
                                            <i class="fas fa-user-edit"></i> Modifier
                                        </button>
                                    </div>
                                </div>
                                <!-- Fourth row -->

                            </form>
                            <!-- Edit Form -->

                        </div>
                        <!-- Card content -->

                    </div>
                    <!-- Card -->

                </div>
                <!-- Second column -->

            </div>
            <!-- First row -->

        </section>
        <!-- Section: Edit Account -->

    </div>

</main>
<!-- Main layout -->