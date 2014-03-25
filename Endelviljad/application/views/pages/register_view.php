
<div id="content">
    
<div class="reg_center">
	<h1>Kasutajaks registreerimine</h1>
	<span id="reg-all">Palun täitke kõik väljad<sup>*</sup></span>
	<!--Register form-->
	<form id="register-form" action="#" onsubmit="return validateForm()" >
		<p>Ettevõtte nimi:</p>
		<p><input class="regUsr" id="usrName" name="name" type="text" maxlength="100" /></p>
		<p>Ettevõtte registrikood:</p>
		<p><input class="regUsr_num" id="usrRegCode" name="code" type="text" maxlength="8" /></p>
		<p class="reg_p">Ettevõtte aadress:</p>
		<p>Tänav&#47;Talu:</p>
		<p><input class="regUsr" id="usrAdrStreet" name="street" type="text" maxlength="50" /></p>
		<p>Maja&#47;Korteri nr:</p>
		<p><input class="regUsr" id="usrAdrHouseNr" name="houseNr" type="text" maxlength="7" /></p>
		<p>Sihtnumber:</p>
		<p><input class="regUsr_num" id="usrAdrPostalCode" name="postalCode" type="text" maxlength="6" /></p>
		<p>Maakond:</p>
		<div><select class="regUsr" name="county" id="usrCounty">
			<option value="harjumaa">Harjumaa</option>
			<option value="hiiumaa">Hiiumaa</option>
			<option value="ida-virumaa">Ida-Virumaa</option>
			<option value="jõgevamaa">Jõgevamaa</option>
			<option value="järvamaa">Järvamaa</option>
			<option value="läänemaa">Läänemaa</option>
			<option value="lääne-virumaa">Lääne-Virumaa</option>
			<option value="põlvamaa">Põlvamaa</option>
			<option value="pärnumaa">Pärnumaa</option>
			<option value="raplamaa">Raplamaa</option>
			<option value="saaremaa">Saaremaa</option>
			<option value="tartumaa">Tartumaa</option>
			<option value="valgamaa">Valgamaa</option>
			<option value="viljandimaa">Viljandimaa</option>
			<option value="võrumaa">Võrumaa</option>
		</select></div>
		<p>Telefon:</p>
		<p><input class="regUsr_num" id="usrTel" name="phone" type="text" maxlength="10" /></p>
		<p>Mobiil:</p>
		<p><input class="regUsr_num" id="usrMob" name="mobile" type="text" maxlength="10" /></p>
		<p>Palun valige roll(id):</p>
		<div><select class="regUsr" id="usrRoll" name="usrRoll">
			<option value="ostja">Ostja</option>
			<option value="müüja">Müüja</option>
			<option value="ostja/müüja">Ostja/Müüja</option>
		</select></div>
		<p class="regUsr">Sisestage kontode arv</p>
		<p><input class="regUsr_num" id="usrAccountNr" name="accounts" type="text" maxlength="2" value="1" /></p>
		<p>Sisestage email:</p>
		<p><input class="regUsr" id="usrEmail" name="email" type="text" maxlength="50" /></p>
		<p><input class="regUsr" id="formReset" name="reset" type="reset" value="Tühjenda väljad" />
		<input class="regUsr" id="formSubmit" name="submit" type="submit" value="Registreeri" /></p>
		
	</form>
</div>