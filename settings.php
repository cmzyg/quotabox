<?php

session_start();
$email = $_SESSION['email'];

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

require_once('config.php');
require_once('autoloader.php');
require_once('settings.php');

$database = new Database;

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset='UTF-8'>
<meta name='author' content='Zygimantas Simkus'>
<meta name='description' content='File storage and exchange'>
<meta name='keywords' content='file, files, exchange, store, upload, retrieve, download'>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Settings</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="bootstrap/css/styles.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="bootstrap/js/boostrap.js"></script>

<link rel='stylesheet' href='style.css' />
</head>

<body>

	<?php include_once('analyticstracking.php'); ?>
	<?php include_once('navigation2.php'); ?>

<div class="center">
<h1>Settings</h1>
</div>
<br />

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<p class="text-center">Banner</p>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<h2 class="text-center">Profile</h2>
			<p>We are the small non-profit that runs the #5 website in the world. We have only 175 staff but serve 500 million users, and have costs like any other top site: servers, power, programs, and staff. Wikipedia is something special. It is like a library or a public park. It is like a temple for the mind, a place we can all go to think and learn. To protect our independence, we'll never run ads. We take no government funds. We survive on donations averaging about £20. Now is the time we ask.</p>
		</div>
		<div class="col-md-4">
			<h2 class="text-center">Security</h2>
			<p>We are the small non-profit that runs the #5 website in the world. We have only 175 staff but serve 500 million users, and have costs like any other top site: servers, power, programs, and staff. Wikipedia is something special. It is like a library or a public park. It is like a temple for the mind, a place we can all go to think and learn. To protect our independence, we'll never run ads. We take no government funds. We survive on donations averaging about £20. Now is the time we ask.</p>
		</div>
		<div class="col-md-4">
			<h2 class="text-center">Other</h2>
			<p>We are the small non-profit that runs the #5 website in the world. We have only 175 staff but serve 500 million users, and have costs like any other top site: servers, power, programs, and staff. Wikipedia is something special. It is like a library or a public park. It is like a temple for the mind, a place we can all go to think and learn. To protect our independence, we'll never run ads. We take no government funds. We survive on donations averaging about £20. Now is the time we ask.</p>
		</div>
	</div>

	<div class="row pull-right">
		<div class="col-md-2">
			<p>sidebar</p>
		</div>

	</div>

</div>



</body>
</html>