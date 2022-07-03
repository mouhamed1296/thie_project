<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <base href="/THIEO/admin/">
    <link rel="shortcut icon" href="public/img/logo.png" type="image/x-icon">
    <title>ETHIC-SA</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="vendor/fontawesome5/css/all.min.css">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="vendor/css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="vendor/css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <style>
        html,
        body,
        .view {
            height: 100%;
        }
        @media (min-width: 560px) and (max-width: 740px) {
            html,
            body,
            .view {
                height: 650px;
            }
        }
        @media (min-width: 800px) and (max-width: 850px) {
            html,
            body,
            .view  {
                height: 650px;
            }
        }
    </style>
</head>

<body class="login-page">
<section class="view intro-2">
    <div class="mask rgba-stylish-strong h-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-5">

                    <!-- Form with header -->
                    <div class="card wow fadeIn" data-wow-delay="0.3s">
                        <form class="card-body" action="controllers/signup.skt.php" method="post">
                            <!-- Header -->
                            <div class="form-header blue">
                                <h3 class="font-weight-500 my-2 py-1"><i class="fas fa-user"></i> S'inscrire</h3>
                            </div>

                            <!-- Body -->
                            <?php
                                if(isset($error)):
                                    if($error == 'none'):
                            ?>
                                <div class="alert alert-success alert-dismissable mt-2" >
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><?= $message ?></strong>
                                </div>
                            <?php
                                    else:
                            ?>
                                <div class="alert alert-danger alert-dismissable mt-2" >
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong><?= $message ?></strong>
                                </div>
                            <?php
                                    endif;
                                endif;
                            ?>
                            <div class="md-form">
                                <i class="fas fa-user prefix white-text"></i>
                                <input type="text" id="orangeForm-name" class="form-control" name="prenom">
                                <label for="orangeForm-name">Votre prénom</label>
                            </div>

                            <div class="md-form">
                                <i class="fas fa-user prefix white-text"></i>
                                <input type="text" id="orangeForm-name" class="form-control" name="nom">
                                <label for="orangeForm-name">Votre nom</label>
                            </div>

                            <div class="md-form">
                                <i class="fas fa-user prefix white-text"></i>
                                <input type="text" id="orangeForm-name" class="form-control" name="username">
                                <label for="orangeForm-name">Votre pseudo</label>
                            </div>

                            <div class="md-form">
                                <i class="fas fa-envelope prefix white-text"></i>
                                <input type="text" id="orangeForm-email" class="form-control" name="email">
                                <label for="orangeForm-email">Votre email</label>
                            </div>

                            <div class="md-form">
                                <i class="fas fa-lock prefix white-text"></i>
                                <input type="password" id="orangeForm-pass" class="form-control" name="password">
                                <label for="orangeForm-pass">Votre password</label>
                            </div>

                            <div class="text-center">
                                <button class="btn blue btn-lg text-white" type="submit" name="signup">S'inscrire</button>
                                <hr class="mt-4">
<!--                                <div class="inline-ul text-center d-flex justify-content-center">-->
<!--                                    <a class="p-2 m-2 fa-lg tw-ic"><i class="fab fa-twitter white-text"></i></a>-->
<!--                                    <a class="p-2 m-2 fa-lg li-ic"><i class="fab fa-linkedin-in white-text"> </i></a>-->
<!--                                    <a class="p-2 m-2 fa-lg ins-ic"><i class="fab fa-instagram white-text"> </i></a>-->
<!--                                </div>-->
                            </div>
                        </form>

                    </div>
                </div>
                <!-- Form with header -->

            </div>
        </div>
    </div>
    </div>
</section>
<!-- Intro Section -->

<!-- SCRIPTS -->
<!-- JQuery -->
<script src="vendor/js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="vendor/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="vendor/js/bootstrap.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="vendor/js/mdb.min.js"></script>

<!-- Custom scripts -->
<script>

    new WOW().init();

</script>

</body>

</html>
