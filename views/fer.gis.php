<div class="row">

    <!-- Grid column -->
    <div class="col-lg-12 pl-sm-5 pr-sm-5 p-2">

        <!--Form with header -->
        <div class="card card-cascade narrower mb-5 ml-3 mr-3">
            <div class="view view-cascade gradient-card-header blue-gradient">
                <h3><i class="fas fa-shopping-bag"></i> Commande Fer</h3>
            </div>

            <form class="card-body card-body-cascade" action="controllers/command.skt.php" method="post">
                <!--Body -->
                <div class="md-form">
                    <i class="fas fa-list prefix orange-text"></i>
                    <input id="fer" name="type_fer" type="text" length="30" class="form-control">
                    <label for="fer">Type de fer</label>
                </div>
                <div class="md-form">
                    <i class="fas fa-sort-numeric-up prefix light-blue-text"></i>
                    <input id="quantite" name="qte_fer" type="text" length="13" class="form-control">
                    <label for="quantite">Quantité</label>
                </div>
                <div class="text-center mt-4">
                    <button class="btn btn-primary" id="btnOne" type="submit" name="buy_fer">Commander</button>
                </div>

            </form>

        </div>
        <!--Form with header -->

    </div>
    <!-- Grid column -->
</div>