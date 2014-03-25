function validateForm()
{
	var validate=isNumber();
	var fields=["usrName","usrRegCode","usrAdrStreet","usrAdrHouseNr","usrAdrPostalCode","usrCounty","usrTel","usrMob","usrRoll","usrAccountNr","usrEmail"];
	if(validate==false)
	{	
		alert("Punasega märgitud väljal peab olema numbriline väärtus");
		return false;
	}
	for(var i=0;i<fields.length;i++)
	{
		var f=document.getElementById(fields[i]);
		if(f.value==null || f.value=="")
		{
			f.style.borderColor="#FF0000";
			if(validate==true)
			{
				validate=false;
			}
		}
	}
	if(validate==true)
	{
		alert("Ok");
		return validate;
		document.getElementById("register-form").innerHTML="Aitäh, et registreerisite!\nTeie registreerimisvorm edukualt saadetud ja me võtame Teiega ühendust 2 tööpäeva jooksul."
	}
	else
	{
		alert("Kõik väljad on kohustuslik. Palun täitke punasega märgitud väljad ja vajutage uuesti nupule 'Registreeri'.");
		return validate;
	}
}

function isNumber()
{
	var x=true;
	var field_num=document.getElementsByClassName("regUsr_num");
	for(var i=0;i<field_num.length;i++)
	{
		if(isNaN(field_num[i].value))
		{
			field_num[i].style.borderColor="#FF0000";
			if(x==true)
			{
				x=false;
			}
		}
		
	}
	return x;
}