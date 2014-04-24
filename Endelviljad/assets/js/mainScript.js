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
//Change User Data
var xmlHttp = createXmlHttpRequestObject();
function createXmlHttpRequestObject() {
    var xmlHttp;
    //If IE, else better
    if (window.ActiveXObject) {
        try {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (e) {
            xmlHttp = false;
        }

    } else {
        try {
            xmlHttp = new XMLHttpRequest();
        } catch (e) {
            xmlHttp = false;
        }
    }
    //if xmlhttp was set to false
    if (!xmlHttp) {
        alert("Can't create requested object");
    } else
        return xmlHttp;
}

//function for deep linking in the profile_view tabs
function tabLinking() {
    //http://stackoverflow.com/questions/7862233/twitter-bootstrap-tabs-go-to-specific-tab-on-page-reload/10787789#10787789
    // Javascript to enable link to tab
    var hash = document.location.hash;
    var prefix = "tab_";

    if (hash) {
        hash = hash.replace(prefix, '');
        var hashPieces = hash.split('?');
        activeTab = $('.nav-tabs a[href=' + hashPieces[0] + ']');
        activeTab && activeTab.tab('show');
    }

// Change hash for page-reload
    $('.nav-tabs a').on('shown.bs.tab', function(e) {
        window.location.hash = e.target.hash.replace("#", "#" + prefix);
    });
}