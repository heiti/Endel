<?php
	//Setting empty string to all fields and errors
	$fieldNames=array("name","regCode","street","houseNr","postalCode","county","phone","usrRoll","email");
	$placeHolders=array("Ettevõtte nimi","Ettevõtte registrikood","Tänav&#47;Talu nimi","Maja&#47;Korteri nr","Sihtnumber","Telefoni number","Emaili aadress");
	$fields=array();
	//Set fields
	for($i=0; $i<count($fieldNames); $i++){
		${$fieldNames[$i]}="";
		array_push($fields, ${$fieldNames[$i]});
	}
	//Set errors
	for($i=0; $i<count($fieldNames); $i++){
		${$fieldNames[$i] . "Err"}="";
	}	
	//If form is submitted
	if(isset($_POST['submit'])){
		//Assigne values to fields
		for($i=0; $i<count($fields);$i++){
			$fields[$i]=$_POST[$fieldNames[$i]];
		}
		//Validate if fields are not empty
		$passed=true; //Set valid true
		for($i=0; $i<count($fields); $i++){
			if(empty($fields[$i])){
				${$fieldNames[$i] . "Err"}="has-error"; //set error for empty field
				$passed=false;
			}
		}
		//Compose email and send it
		if($passed===true){
			$email_from = "heiti.tobi@gmail.com";
			$email_subject = "Endeli uus registreering-$fields[0]";
			$email_body = "\nFirma nimi: $fields[0]\n
							Registrikood: $fields[1]\n
							Tänava nimi: $fields[2]\n
							Maja nr: $fields[3]\n
							Postiindeks: $fields[4]\n
							Maakond: $fields[5]\n
							Telefon: $fields[6]\n
							Roll: $fields[7]\n
							Email: $fields[8]\n";
			$to = "heiti.tobi@gmail.com";
			$headers = "From: $email_from \r\n";
			$headers .= "Reply-To: $email \r\n";
			//Send email
			mail($to,$email_subject,$email_body,$headers);
			//Clear POST array
			$_POST=Array();
			//Redirect to registration page and set msg=true to display confirmation message for user
			$msg=true;
			header("Location: http://endel.mt.ut.ee/home/index/register?submit_msg=$msg");
			exit;
		}
	}
?>

<!--Start content-->
<div class="container">
	<div class="col-lg-7 col-lg-offset-2" <?php if(isset($_GET['submit_msg'])) {echo 'style="display: block"';} else{echo 'style="display: none"';} ?> >
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-lg-12">
					<div class="row">
						<span class="h2">Kasutajaks registreerimine</span>
					</div>
					<br />
					<div class="row">
						<span>Teie registreerimisvorm on edukalt saadetud ja võtame Teiega ühendust 2 tööpäeva jooksul.<br />
						Uut registreeringut saab sooritada, kui liigute lehele <a href="<?php echo base_url("home/index/register"); ?>">Registreeru</a>.
						</span>
					</div>
					<br />
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-7 col-lg-offset-2" <?php if(isset($_GET['submit_msg'])) {echo 'style="display: none"';}?> >
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-lg-12">
					<div class="row">
						<span class="h2">Kasutajaks registreerimine</span>
					</div>
					<br />
					<div class="row text-danger">
						<span>Palun täitke kõik väljad<sup>*</sup></span>
					</div>
					<br />
				</div>
<!--Start form-->
				<form id="register-form" class="form-horizontal" role="form" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
					<div class="form-group <?php echo $nameErr;?>">
						<label for="usrName" class="col-sm-4 control-label">Ettevõtte nimi</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" id="usrName" name="name" placeholder="Ettevõtte nimi" maxlength="100" value="<?php echo $fields[0]; ?>" />
						</div>
					</div>
					<div class="form-group <?php echo $regCodeErr;?>">
						<label for="usrRegCode" class="col-sm-4 control-label">Registrikood</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" id="usrRegCode" name="regCode" placeholder="Ettevõtte registrikood" maxlength="8" value="<?php echo $fields[1];?>" />
						</div>
					</div>
					<div class="form-group <?php echo $streetErr;?>">
						<label class="col-sm-8 col-sm-offset-1"><u>Ettevõtte aadress:</u></label>
						<label for="usrAdrStreet" class="col-sm-4 control-label">Tänava&#47;Talu</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" id="usrAdrStreet" name="street" placeholder="Tänav&#47;Talu nimi" maxlength="50" value="<?php echo $fields[2];?>" />
						</div>
					</div>
					<div class="form-group <?php echo $houseNrErr;?>">
						<label for="usrAdrHouseNr" class="col-sm-4 control-label">Maja&#47;Korteri nr</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" id="usrAdrHouseNr" name="houseNr" placeholder="Maja&#47;Korteri nr" maxlength="7" value="<?php echo $fields[3];?>" />
						</div>
					</div>
					<div class="form-group <?php echo $postalCodeErr;?>">
						<label for="usrAdrPostalCode" class="col-sm-4 control-label">Sihtnumber</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" id="usrAdrPostalCode" name="postalCode" placeholder="Sihtnumber" maxlength="6" value="<?php echo $fields[4];?>" />
						</div>
					</div>
					<div class="form-group <?php echo $countyErr;?>">
						<label for="usrCounty" class="col-sm-4 control-label">Maakond</label>
						<div class="col-sm-8">
							<select class="form-control" id="usrCounty" name="county">
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
						</div>
					</div>
					<div class="form-group <?php echo $phoneErr;?>">
						<label for="usrTel" class="col-sm-4 control-label">Kontakttelefon</label>
						<div class="col-sm-8">
							<input class="form-control" type="tel" id="usrTel" name="phone" placeholder="Telefoni number" maxlength="10" value="<?php echo $fields[6];?>" />
						</div>
					</div>
					<div class="form-group <?php echo $usrRollErr;?>">
						<label for="usrRoll" class="col-sm-4 control-label">Valige roll(id)</label>
						<div class="col-sm-8">
							<select class="form-control" id="usrRoll" name="usrRoll">
								<option value="">Vali roll</option>
								<option value="ostja">Ostja</option>
								<option value="müüja">Müüja</option>
								<option value="ostja/müüja">Ostja/Müüja</option>
							</select>
						</div>
					</div>					
					<div class="form-group <?php echo $emailErr;?>">
						<label for="usrEmail" class="col-sm-4 control-label">Emaili aadress</label>
						<div class="col-sm-8">
							<input class="form-control" type="email" id="usrEmail" name="email" placeholder="Emaili aadress" maxlength="50" value="<?php echo $fields[8];?>" />
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-4 col-sm-3">
							<button type="reset" class="btn btn-default" name="reset">Tühjenda väljad</button>
						</div>
						<div class="col-sm-3">
							<button type="submit" class="btn btn-primary" name="submit">Registreeru</button>
						</div>
					</div>
				</form>
<!--/form-->
			</div>
		</div>
	</div>
</div>
<!--/content-->