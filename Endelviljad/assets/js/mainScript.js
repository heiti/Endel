//Valideerib vormi välju registreerimisvormis
function validateForm(formName) {
    var elements = document.getElementById(formName).elements;//Vormi väljade list
    var validate = true; //Seame esialgu valiidseks
    //Kontrollime, kas kõik väljad on täidetud
    for (var i = 0; i < elements.length - 2; i++) {//-2, sest elementideks loeb ka 'Registreeri' ja 'Tühjenda' nupud
        var el = elements[i];
        if (el.value == null || el.value == "") {
            validate = false;
            el.className += ' input-err';
        }
    }
    if (validate != true) {
        alert("Kontrollige, et kõik väljad oleks täidetud.")
    }
    return validate;
}