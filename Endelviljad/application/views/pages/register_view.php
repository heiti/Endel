<!--Kontrollib, kas vorm on sisestatud ja kui jah, siis saadab vormi sisu kirjana-->
	<?php
		//Setting all the variables
		$errors=array("name","regCode","street","houseNr","posCode","county","phone","mobile","usrRoll","accounts","email");
		foreach($errors as $er)//set an empty error messages
		{
			${$er . "Err"} = "";
		}
		$name = $registrationCode = $street = $houseNr = $postalCode = $county = "";
		$phone = $mobile = $usrRoll = $accounts = $email = "";
		//If form is submitted
		if(isset($_POST['submit'])) 
		{ 	
			//Form fields
			$name=$_POST['name'];
			$registrationCode=$_POST['registrationCode'];
			$street=$_POST['street'];
			$houseNr=$_POST['houseNr'];
			$postalCode=$_POST['postalCode'];
			$county=$_POST['county'];
			$phone=$_POST['phone'];
			$mobile=$_POST['mobile'];
			$usrRoll=$_POST['usrRoll'];
			$accounts=$_POST['accounts'];
			$email=$_POST['email'];
			
			//Additional PHP form validation(good if javascript is turned off)
			$passed=true; //Set validate true
			$fields=array($name,$registrationCode,$street,$houseNr,$postalCode,$county,$phone,$mobile,$usrRoll,$accounts,$email);
			for($i=0; $i<count($fields);$i++)
			{
				if(empty($fields[$i]))
				{
					${$errors[$i] . "Err"}="Kohustuslik väli";//set an error message
					$passed=false;
				}
			}
			
			//Compose email
			if($passed===true)
			{
				$email_from = 'heiti.tobi@gmail.com';
				$email_subject = "Endeli uus registreering-$name";
				$email_body = "Firma nimi: $name\n
							Registrikood: $registrationCode\n
							Tänava nimi: $street\n
							Maja nr: $houseNr\n
							Postiindeks: $postalCode\n
							Maakond: $county\n
							Telefon: $phone\n
							Mobiil: $mobile\n
							Roll: $usrRoll\n
							Kontode arv: $accounts\n
							Email: $email\n";

				$to = "heiti.tobi@gmail.com";
				$headers = "From: $email_from \r\n";
				$headers .= "Reply-To: $email \r\n";
				//Saadame kirja
				mail($to,$email_subject,$email_body,$headers);
				//Tagasi registreerimise lehele
				$msg=true;
				header("Location: http://endel.mt.ut.ee/register?submit_msg=$msg");
				exit;
			}
		}		
	?>
	
<!--Kui kõik väljad ei ole täidetud, siis kuvatakse veebilehel blokk 'error'-->
<div id="error">
	<span>Kõik väljad ei ole täidetud. Palun täitke kõik punasega märgitud väljad!</span>
</div>

<!--Kui vorm on edukalt saadetud, siis kuvatakse blokk 'form_sent'-->
<div <?php if(isset($_GET['submit_msg'])) { echo 'style="display: block"'; } ?>id="form_sent">
	<p>
		<span>Teie registreerimisvorm on edukalt saadetud ja võtame Teiega ühendust 2 tööpäeva jooksul.<br />
				Uut registreeringut saab sooritada, kui liigute lehele <a href="<?php echo base_url("register"); ?>">Registreeru</a>
		</span>
	</p>
</div>

<!--Class register-->
<div class="register" id="register" <?php if(isset($_GET['submit_msg'])) { echo 'style="display: none"'; } ?>>
	
	<h1>Kasutajaks registreerimine</h1>
	<span id="reg-all">Palun täitke kõik väljad<sup>*</sup></span><br />
	
	<!--Start code for Register form-->
	<form id="register-form" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" onsubmit="return validateForm('register-form')">
		<p>
			<label for='usrName'>Ettevõtte nimi:</label><br />
			<input id="usrName" name="name" type="text" maxlength="100" value="<?php echo $name?>" />
			<span class="errorMessage"><sup>*</sup><?php echo $nameErr;?></span>
		</p>
		<p>
			<label for='usrRegCode'>Ettevõtte registrikood:</label><br />
			<input id="usrRegCode" name="registrationCode" type="text" maxlength="8" value="<?php echo $registrationCode?>" />
			<span class="errorMessage"><sup>*</sup><?php echo $regCodeErr;?></span>
		</p>
		<p>
			<label >Ettevõtte aadress:</label><br /><br />
			<label for='usrAdrStreet'>Tänav&#47;Talu:</label><br />
			<input id="usrAdrStreet" name="street" type="text" maxlength="50" value="<?php echo $street?>"/>
			<span class="errorMessage"><sup>*</sup><?php echo $streetErr;?></span>
		</p>
		<p>
			<label for='usrAdrHouseNr'>Maja&#47;Korteri nr:</label><br />
			<input id="usrAdrHouseNr" name="houseNr" type="text" maxlength="7" value="<?php echo $houseNr?>"/>
			<span class="errorMessage"><sup>*</sup><?php echo $houseNrErr;?></span>
		</p>
		<p>
			<label for='usrAdrPostalCode'>Sihtnumber:</label><br />
			<input id="usrAdrPostalCode" name="postalCode" type="text" maxlength="6" value="<?php echo $postalCode?>"/>
			<span class="errorMessage"><sup>*</sup><?php echo $posCodeErr;?></span>
		</p>
		<p>
			<label for='usrCounty'>Maakond:</label><br />
				<select id="usrCounty" name="county">
				<option value="">Vali maakond</option>
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
				</select>
			<span class="errorMessage"><sup>*</sup><?php echo $countyErr;?></span>
		</p>
		<p>
			<label for='usrTel'>Telefon:</label><br />
			<input id="usrTel" name="phone" type="text" maxlength="10" value="<?php echo $phone?>"/>
			<span class="errorMessage"><sup>*</sup><?php echo $phoneErr;?></span>
		</p>
		<p>
			<label for='usrMob'>Mobiil:</label><br />
			<input id="usrMob" name="mobile" type="text" maxlength="10" value="<?php echo $mobile?>"/>
			<span class="errorMessage"><sup>*</sup><?php echo $mobileErr;?></span>
		</p>
		<p>
			<label for='usrRoll'>Palun valige roll(id):</label><br />
				<select id="usrRoll" name="usrRoll">
				<option value="">Vali roll</option>
				<option value="ostja">Ostja</option>
				<option value="müüja">Müüja</option>
				<option value="ostja/müüja">Ostja/Müüja</option>
				</select>
			<span class="errorMessage"><sup>*</sup><?php echo $usrRollErr;?></span>
		</p>
		<p>
			<label for='usrAccountNr'>Sisestage kontode arv</label><br />
			<input id="usrAccountNr" name="accounts" type="text" maxlength="2" value="<?php echo $accounts?>"/>
			<span class="errorMessage"><sup>*</sup><?php echo $accountsErr;?></span>
		</p>
		<p>
			<label for='usrEmail'>Sisestage email:</label><br />
			<input id="usrEmail" name="email" type="text" maxlength="50" value="<?php echo $email?>"/>
			<span class="errorMessage"><sup>*</sup><?php echo $emailErr;?></span>
		</p>
		<p>
			<input id="formReset" name="reset" type="reset" value="Tühjenda väljad" />
			<input id="formSubmit" name="submit" type="submit" value="Registreeri" />
		</p>
	</form>
</div>
<!-- /register-->

