//Valideerib vormi välju
function validateForm(fName)
{
	var elements=document.forms[fName].elements;//Vormi väljade list
	var validate=true;
	//Kontrollime, kas kõik väljad on täidetud
	for(var i=0;i<elements.length-2;i++)//-2, sest elementideks loeb ka 'Registreeri' ja 'Tühjenda' nupud
	{
		var el = elements[i];
		if(el.value==null || el.value=="")
		{
		validate=false;
		el.style.backgroundColor="#FF0000";
		el.style.opacity=0.3;
		document.getElementById("error").style.display="block";
		}
	}
	if(validate==true)
	{
		document.getElementById("register").style.display="none";
		document.getElementById("form_sent").style.display="block";
	}
return validate;

}
