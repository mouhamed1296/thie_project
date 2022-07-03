$(document).ready(function () {
    load_products();
    load_cart_item_number();

    //Envoi des données pour la supression d'un produit

    $(".delete").click(function(e){
        e.preventDefault();
        //alert('supp clicked');
        let el = this;
        let id = this.id;
        let splitid = id.split("_");

        // Delete id
        let deleteid = splitid[1];
        //console.log(deleteid);
        // AJAX Request
        $.ajax({
            url: 'controllers/command.skt.php',
            type: 'POST',
            data: { id:deleteid },
            success: function(response){
                $("#deleteResponse").html(response).show("slow").delay(4000).hide("slow");
                load_cart_item_number();
                $(el).closest('tr').css('background','tomato');
                $(el).closest('tr').fadeOut(800,function(){
                    $(this).remove();
                });
                location.reload();
            },
            error: function(response){
                $("#deleteResponse").html(response).show("slow").delay(4000).hide("slow");
            }
        });
    });

    //Envoi des données pour la modification de la quantité d'un produit

    $(".itemQty").on("change", function(){
        let $el = $(this).closest('tr');
        let prodid = $el.find('.prodid').val();
        let prodprice = $el.find('.prodprice').val();
        let qty = $el.find('.itemQty').val();
        window.location.reload();
        $.ajax({
            url: "controllers/command.skt.php",
            method: "post",
            cache: false,
            data: {qty:qty, prodid:prodid, prodprice:prodprice},
            success: function (response) {
                console.log(response);
            }
        });
    });

    //Fonction pour l'envoi des données nécessaires au chargement de tous les produits

    function load_products() {
        $.ajax({
          url: 'controllers/command.skt.php',
          method: 'get',
          data: {produits: "produits"},
          success: function (response) {
            $("#productItems").html(response);

            //adding product to cart 

            $(".addProdBtn").click(function (e) {
              e.preventDefault();
              let $form = $(this).closest(".cartAddForm");
              let pid = $form.find(".pid").val();
              let plib = $form.find(".plib").val();
              let ppu = $form.find(".ppu").val();
              let pimage = $form.find(".pimage").val();
              let pcode = $form.find(".pcode").val();
              let pcateg = $form.find(".pcateg").val();
              $.ajax({
                url: 'controllers/command.skt.php',
                method: 'post',
                data: {pid:pid,plib:plib,ppu:ppu,pimage:pimage,pcode:pcode,pcateg:pcateg},

                //response success
          
                success:function(response){
                  window.scrollTo(450,450);
                  $('#message').html(response).show("slow").delay(4000).hide("slow");
                  load_cart_item_number();
                  //load_cart_item();
                },
          
                //error response
          
                error: function(){
                  $('#message').show("slow").delay(5000).hide("slow");
                }
              });
            });
          
          }
        });
    }
    //Ajout de produits depuis la page du produit
    $('#addToCart').click(function (e) {
        e.preventDefault();
        let $form = $(this).closest("#cartAddForm");
        let pid = $form.find("#addid").val();
        let plib = $form.find("#addlib").val();
        let ppu = $form.find("#addpu").val();
        let pimage = $form.find("#addimg").val();
        let pcode = $form.find("#addcode").val();
        let pcateg = $form.find("#addcateg").val();
        let pqte = $form.find("#qte").val();
        $.ajax({
            url: 'controllers/command.skt.php',
            method: 'post',
            data: {pid:pid,plib:plib,ppu:ppu,pimage:pimage,pcode:pcode,pcateg:pcateg,pqte:pqte},

            //response success

            success:function(response){
                window.scrollTo(450,450);
                $('#addMessage').html(response).show("slow").delay(4000).hide("slow");
                load_cart_item_number();
            },

            //error response

            error: function(){
                $('#addMessage').show("slow").delay(5000).hide("slow");
            }
        });
    });
    //Fonction pour le chargement du nombre de produit qui sont dans le panier

    function load_cart_item_number() {
      $.ajax({
        url: 'controllers/command.skt.php',
        method: 'get',
        data: {cartItem: "cart_item"},
        success: function (response) {
          $("#cart-item").html(response);
        }
      });
    }

    $("#scrollTop").click(function (e) {
      e.preventDefault();
      window.scrollTo(0,0);
    });
});

