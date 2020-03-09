
console.log("hello there");
$(document).ready(function() {

    function validateFormConnect() {
        var myvarForm = document.forms['myForm'];

        if (myvarForm.elements['password'].value == "") {
            alert("Veuillez renseigner le mot de passe.");
            myvarForm.elements['password'].focus();
            return false;
        }
        if (myvarForm.elements['email'].value == "") {
            alert("Veuillez renseigner l'email.");
            myvarForm.elements['email'].focus();
            return false;
        }
    }

    $('#valider').click(function(){
        validateFormConnect();
    });


});