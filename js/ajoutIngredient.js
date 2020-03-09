
console.log("hello there");
$(document).ready(function() {

    function validateForm() {
        var myvarForm = document.forms['myForm'];

        if (myvarForm.elements['name'].value == "") {
            alert("Veuillez renseigner le nom.");
            myvarForm.elements['name'].focus();
            return false;
        }
        if (myvarForm.elements['unit'].value == "") {
            alert("Veuillez renseigner l'unité.");
            myvarForm.elements['unit'].focus();
            return false;
        }
    }

    $('#validation').click(function(){
        validateForm();
    });

});