    <div class="row form-header">
        <h3>NOUS - CONTACTER</h3>
    </div>
    <div class="form">
        <div class="form-body">
            <?php
            if (isset($_GET['error']) && !empty($_GET['error']))
            {
                if ($_GET['error'] == "emptyfields")
                {
                    echo "<div class = 'alert alert-danger'>
                            <span class='fas fa-3x fa-times dang-icon'></span>
                            <p>Veuillez remplir tous les champs!</p>
                          </div>";
                }
                else if ($_GET['error'] == "sqlerror")
                {
                    echo "<div class = 'alert alert-danger'>
                            <span class='fas fa-3x fa-times dang-icon'></span>
                            <p>Erreur sql !</p>
                          </div>";
                }
                else if ($_GET['error'] == "invalidmail")
                {
                    echo "<div class = 'alert alert-danger'>
                            <span class='fas fa-3x fa-times dang-icon'></span>
                            <p><b style='color: darkred'>Erreur: </b>Adresse mail invalide!</p>
                          </div>";
                }
                else if ($_GET['error'] == "invalidprenomnom")
                {
                    echo "<div class = 'alert alert-danger'>
                            <span class='fas fa-3x fa-times dang-icon'></span>
                            <p><b style='color: darkred'>Erreur: </b>Nom ou prenom pas dans le bon format!</p>
                          </div>";
                }
                else if ($_GET['error'] == "notprepared")
                {
                    echo "<div class = 'alert alert-danger'>
                            <span class='fas fa-3x fa-times dang-icon'></span>
                            <p><b style='color: darkred'>Erreur - FATAL:</b> Requête sql non-préparée!</p>
                          </div>";
                }
                else if($_GET['error'] == "false")
                {
                    echo "<div class = 'alert alert-success'>
                            <span class='fas fa-3x fa-check-square succ-icon'></span>
                            <p>Votre message a bien été envoyé.Nous vous enverrons un mail pour répondre à votre demande.<br>Merci !!!</p>
                          </div>";
                }
                else{
                    throw new Exception("Erreur: exception inconnue !!!");
                }
            }
            ?>
            <form id="myForm" action="controllers/form.skt.php" method="post">
                <div class="form-group">
                    <label class="col-form-label">
                        <i class='fa fa-user' style="margin-right:4px;"></i>Entrer  Votre Nom
                        <sup>
                            <i class="fas fa-asterisk"></i>
                        </sup>
                        <div id="nom">
                            <input class="form-control" id="nom" placeholder="Nom" type="text" name="nomid" autocomplete="off" required/>
                            <span class="lds-dual-ring"></span>
                            <span class="invalid-feedback"></span>
                        </div>
                    </label>
                </div>
                <div class="form-group">
                    <label class="col-form-label">
                        <i class='fa fa-user' style="margin-right:4px;"></i>Entrer  Votre Prenom
                        <sup>
                            <i class="fas fa-asterisk"></i>
                        </sup>
                        <div id="prenom">
                            <input class="form-control" id="prenom" placeholder="Prenom" type="text" name="prenomid" autocomplete="off" required/>
                            <span class="lds-dual-ring"></span>
                            <span class="invalid-feedback"></span>
                        </div>
                    </label>
                </div>
                <div class="form-group">
                    <label class="col-form-label">
                        <i class='fa fa-male' style="margin-right:4px;"></i><i class='fa fa-female' style="margin-right:4px;"></i>Sexe
                        <sup>
                            <i class="fas fa-asterisk"></i>
                        </sup>
                        <select name="sexe" class="custom-select" required>
                            <option class="form-control" value="" checked="true"></option>
                            <option class="form-control" value="M">M</option>
                            <option class="form-control" value="F">F</option>
                        </select>
                        <span class="lds-dual-ring"></span>
                    </label>
                </div>
                <div class="form-group">
                    <label class="col-form-label">
                        <i class='fa fa-map-marked-alt' style="margin-right:4px;"></i>Entrer  Votre Adresse
                        <div id="adresse">
                            <input class="form-control" id="adresse" placeholder="Adresse" type="text" name="adresseid" autocomplete="off"/>
                            <span class="lds-dual-ring"></span>
                            <span class="invalid-feedback"></span>
                        </div>
                    </label>
                </div>
                <div class="form-group">
                    <label class="col-form-label">
                        <i class='fa fa-envelope' style="margin-right:4px;"></i>Entrer  Votre Email
                        <sup>
                            <i class="fas fa-asterisk"></i>
                        </sup>
                        <div id="email">
                            <input class="form-control" id="email" placeholder="Email" type="email" name="emailid" autocomplete="off" required/>
                            <span class="lds-dual-ring"></span>
                            <span class="invalid-feedback"></span>
                        </div>
                    </label>
                </div>
                <div class="form-group">
                    <label class="col-form-label">
                        <i class='fas fa-tags' style="margin-right:4px;"></i>Objet
                        <sup>
                            <i class="fas fa-asterisk"></i>
                        </sup>
                        <div id="objet">
                            <input class="form-control" id="objet" placeholder="objet" type="text" name="objet" autocomplete="off" required/>
                            <span class="lds-dual-ring"></span>
                            <span class="invalid-feedback"></span>
                        </div>
                    </label>
                </div>
                <div class="form-group">
                    <label class="col-form-label">
                        <i class='fas fa-envelope' style="margin-right:4px;"></i>Votre Message
                        <sup>
                            <i class="fas fa-asterisk"></i>
                        </sup>
                        <textarea class="form-control" name="message" placeholder="Taper votre message ici" autocomplete="off" required ></textarea>
                    </label>
                </div>
                <button type="submit" name="send" class="btn btn-blue">
                    <i class='fas fa-paper-plane' style="margin-right:4px;"></i>
                    Envoyer
                </button>
                <span class="fa fa-check-circle"></span>
            </form><br>
            <p>
                <b>
                    <u>NB:</u>
                </b><br>
                (<span style="color:red;">*</span>)
                <span  style="color:red;">Champ Obligatoire</span>
            </p>
        </div>
    </div>
