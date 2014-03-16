
		<div id="column-left">
			tere meist meist meist mere maailm tere maailm tere maailm 
			siia käib kõik otsinguasi
			nii lahe otsida
			kõikide asjade seast
		</div>

		<div id="column-right">
			<div id="content">

				<div id="content-prod">
					<h1>Toode 1</h1>
					<p>
						<img src="<?php echo base_url("assets/img/us.jpg") ?>" width="670" height="213"
							alt="Meie" />
						<?php  echo "andmed Endel andmebaasist: <br/> ";
							foreach($endelprod as $prod){
								echo $prod->id."  ".$prod->müüja_id."   ". $prod->kogus."   ". $prod->hind."<br/>";
							}
						
						?>
					</p>
				</div>

				<div id="content-prod">
					<h1>Toode 2</h1>
					<p>
						<img src="<?php echo base_url("assets/img/fruit.jpg") ?>" width="670" height="213"
							alt="Puuviljad" />
					</p>
				</div>


			</div>
		</div>