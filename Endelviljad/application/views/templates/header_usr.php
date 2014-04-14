<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1"></meta>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"></meta>
		<meta name="description" content="Endel Viljad - kõik puu- ja juurviljad ühest kohast"></meta>
		<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" type="text/css"></link>
		<title>Endel Viljad</title>
	</head>
	<body>
	<!--Start #wrap(helps to push footer down)-->
	<div id="wrap">
		<!--Start navbar-->
		<div class="navbar navbar-default">
		  <div class="container">
			<a class="navbar-brand hidden-xs" href="<?php echo base_url(); ?>"><img src="<?php echo base_url("assets/img/logo_v.png"); ?>" class="img-responsive" alt="Avaleht"/></a>
			<ul class="nav navbar-nav">
			  <li><a href="<?php echo base_url(); ?>">Avaleht</a></li>
			  <li><a href="<?php echo base_url("about"); ?>">Meist</a></li>
			  <li><a href="<?php echo base_url("products"); ?>">Kaubad</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo base_url("myproducts"); ?>">Minu tehingud</a></li>
				<li><a href="<?php echo base_url("myproducts"); ?>">Minu tooted</a></li>
				<li><a href="<?php echo base_url("myproducts"); ?>"><abbr title="Ostukorv"><span class="glyphicon glyphicon-shopping-cart"></span></abbr></a></li>
				<li><a href="<?php echo base_url("user"); ?>"><abbr title="<?php echo $this->session->userdata['name']; ?> seaded"><span class="glyphicon glyphicon-cog"></span></abbr></a></li>
				<li><a href="<?php echo base_url("logout"); ?>"><abbr title="Logi välja"><span class="glyphicon glyphicon-log-out"></span></abbr></a></li>
			</ul>
		  </div>
		</div>		
		<!--/navbar-->