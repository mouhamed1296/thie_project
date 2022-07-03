$(function(){
       //fonction de vérification du formulaire , elles renvoient true si tout est OK
    /**
     * 
     * @param {string} id 
     */
    function valid(id)
    {
        let feedback = $('#'+ id +' span.invalid-feedback'),
            loader = $('#'+ id + '+ span.lds-dual-ring');
        feedback.css({
            display: 'none',
        });
        loader.css({
            display: 'none',
        });
        $('#'+ id + ' input').removeClass('is-invalid').addClass('is-valid');
        return true;
    }
    /**
     * 
     * @param {string} id 
     * @param {string} text 
     */
    function invalid(id, text)
    {
        let feedback = $('#'+ id + '  span.invalid-feedback'),
            loader = $('#'+ id + '+ span.lds-dual-ring');
        feedback.css({
            display: 'block',
        });
        feedback.text(text);
        loader.css({
            display: 'none',
        });
        $('#'+ id + ' input').addClass('is-invalid').removeClass('is-valid');
        return false;
    }

    //on met toutes nos fonctions dans un objet littéral

    let check = {};

        //Validation du champ nom

        check['nom'] = function () {
            let nom = $('#nom input').val(),
                pattern = /^[a-z]([a-z_\s])+$/i;
            if (nom.length >= 2 && nom.match(pattern)){
                valid('nom');
           }
           else if(nom.length < 2)
           {
                invalid('nom', 'Nom trop court Saisissez au moins 2 caractères');
           }
           else
            {
                invalid('nom', 'Un nom ne doit contenir que des lettres');
            }
       };

        //Validation du champ prenom
///^([0-9a-zA-Z])+$/ password regex
       check['prenom'] = function () {
           let prenom = $('#prenom input').val(),
               pattern = /^[a-z]([a-z_\s])+$/i;
           if (prenom.length >= 3 && prenom.match(pattern)){
               valid('prenom');
           }
           else if(prenom.length < 3)
           {
               invalid('prenom', 'Un prenom doit avoir au moins 3 caractères');
           }
           else
           {
               invalid('prenom', 'Un prenom ne doit contenir que des lettres');
           }
       };

       //Validation du champ adresse

       check['adresse'] = function () {
            let adresse = $('#adresse input').val();
            if(adresse)
            {
                valid('adresse');
            }
            else
            {
                invalid('adresse', 'Veuillez saisir une adresse');
            }
       };

       //Validation du champ email

       check['email'] = function () {
            let email = $('#email input').val(),
                pattern = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
            if (email.length >=8 && email.match(pattern))
            {
                valid('email');
            }
            else if(email.length < 8)
            {
                invalid('email', 'Email trop court veuillez entrer au moins 8 caractère');
            }
            else
            {
                invalid('email', 'Email pas dans le bon format: example@gmail.com');
            }
       };

       //Validation du champ objet

       check['objet'] = function () {
            let objet = $('#objet input').val(),
                pattern = /^[a-z ]+$/i;
            if(objet.length >= 8 && objet.match(pattern))
            {
                valid('objet');
            }
            else if(objet.length < 8)
            {
                invalid('objet', 'L\'objet doit contenir au moins 8 lettres');
            }
            else
            {
                invalid('objet', 'Un objet ne doit contenir que des lettres');
            }
       };

       //Verification des entrées pour chaque champ et à la soumission du formulaire

       $(function () {
           let myForm = $('#myForm'),
               inputs = $('input'),
               inputsLength = inputs.length;
           for (let i = 0; i < inputsLength; i++)
           {
               if (inputs[i].type === 'text' || inputs[i].type === 'email')
               {
                   inputs[i].onkeyup = function () {
                       check[this.id](this.id);
                       //this représente l'input actuellement modifié
                   };
               }
           }
           myForm.onsubmit = function () {
               let result = true;
               for (let i in check)
               {
                   result = check[i](i) && result;
               }
               if (result)
               {
                   $('fa-check-circle').css({display: 'flex'});
               }
               return false;
           };
       });
   }
);
