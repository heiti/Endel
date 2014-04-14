<!--content-->
<div class="container">
	<div class="row">
		<div class="col-lg-9">
			  <h2>Meie oleme...</h2>
			  <img src="<?php echo base_url("assets/img/us.jpg") ?>" class="img-responsive" alt="Meie"></img>
		</div>
		<div class="col-lg-3">
		<br />
		<br />
		<br />
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Meie suurimad kliendid</h3>
			  	</div>
			  	<div class="panel-body">
					<?php
					ini_set('error_reporting', E_ALL);
					ini_set('display_errors', 'On');  //On or Off
					$this->table->set_heading(array('', 'Müüja', 'Toodete arv'));
					foreach ($info as $prod) {
						$this->table->add_row($prod);
					}
					echo $this->table->generate();
					?>
			  	</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Võta meiega ühendust</h3>
			  	</div>
			  	<div class="panel-body">
			  		<a href="<?php echo base_url("home/index/sendmsg"); ?>">Saada sõnum</a>
			  	</div>
			</div>
		</div>
	</div>
</div>
