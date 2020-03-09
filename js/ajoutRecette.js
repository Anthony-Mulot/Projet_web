
console.log("hello there");
$(document).ready(function() {

    function validateForm() {
        var myvarForm = document.forms['myForm'];

        if (myvarForm.elements['title'].value == "") {
            alert("Veuillez renseigner le titre.");
            myvarForm.elements['title'].focus();
            return false;
        }
        if (myvarForm.elements['content'].value == "") {
            alert("Veuillez renseigner le contenu.");
            myvarForm.elements['content'].focus();
            return false;
        }
        if (myvarForm.elements['duree'].value == "") {
            alert("Veuillez renseigner la durée.");
            myvarForm.elements['duree'].focus();
            return false;
        }
        if (myvarForm.elements['persons'].value == "") {
            alert("Veuillez renseigner le nombre de personnes.");
            myvarForm.elements['persons'].focus();
            return false;
        }
        if (myvarForm.elements['quantity'].value == "") {
            alert("Veuillez renseigner la quantité.");
            myvarForm.elements['quantity'].focus();
            return false;
        }
    }

    $('#validation').click(function(){
        validateForm();
    });

});