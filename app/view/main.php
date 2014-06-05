<?php
	require_once("Session.php");
 	
	if ( !Session::validate() ) 
		exit;	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?= L::title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<?php include_once('include-css.php'); ?>	
</head>
<body>
	<div class="container-fluid" >	
		<div class="row">
			<div class="col-sm-2 ef-head">
				<?php include_once('mn-menu.php'); ?>
			</div>
	
			<div class="col-sm-10 ef-container">
				<?php 
				include_once('mn-inicio.php'); 
				
				include_once('main-users.php');
				
				//include_once('main-operadores.php');
				//include_once('main-servidor.php');
				//include_once('main-aplicativo.php');
				//include_once('main-descriptografia.php');
				?>
			</div>
		</div> 	
	</div>
	
	<?php include_once('include-js.php'); ?>	
</body>
</html>