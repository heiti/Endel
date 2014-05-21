<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Cache-Control: no-cache");
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html manifest="<?php echo base_url("cache.appcache"); ?>">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<meta name="description" content="Endel Viljad - kõik puu- ja juurviljad ühest kohast" />
		<title>Endel Viljad</title>
		<link rel="stylesheet" href="<?php echo base_url("assets/css/style.min.css"); ?>" type="text/css" />
	</head>
	<body>
	<!--Start #wrap(helps to push footer down)-->
	<div id="wrap">
		<!--Start navbar-->
		<div class="navbar navbar-default">
		  <div class="container">
			<a class="navbar-brand hidden-xs" href="<?php echo base_url("home"); ?>"><img src="<?php echo base_url("assets/img/logo_v.png"); ?>" class="img-responsive" alt="Avaleht"/></a>
			<ul class="nav navbar-nav">
			  <li><a href="<?php echo base_url("home"); ?>">Avaleht</a></li>
			  <li><a href="<?php echo base_url("about"); ?>">Meist</a></li>
			  <li><a href="<?php echo base_url("products"); ?>">Kaubad</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo base_url("home/index/register"); ?>">Registreeru</a></li>
				<li><a href="<?php echo base_url("login"); ?>">Logi sisse</a></li>
			</ul>
		  </div>
		</div>	