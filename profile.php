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


$database->query("SELECT name FROM users WHERE email = 'z.simkus@yahoo.com'");
$name = $database->single();
$name = implode(" ", $name);


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset='UTF-8'>
<meta name='author' content='Zygimantas Simkus'>
<meta name='description' content='File storage and exchange'>
<meta name='keywords' content='file, files, exchange, store, upload, retrieve, download'>
<title><?php echo $title; ?></title>

<link rel='stylesheet' href='style.css' />
<script src='functions.js'></script>
</head>

<body>

	<?php include_once('analyticstracking.php'); ?>
	<?php include_once('navigation2.php'); ?>

<div class="center">
<h1>Profile</h1>
</div>
<br /><br />
<div class="main_content">
<form name="profile" method="POST" action="edit_profile">
	<span>Name</span><br >
	<input type="text" class="join_form" id="name" onfocus="changeBorderName()" onblur="returnBorderName()" value="<?php echo $name; ?>"/><br /><br />
	<label>Email</label><br />
	<input type="text" class="join_form" id="email" onfocus="changeBorderEmail()" onblur="returnBorderEmail()" value="<?php echo $email; ?>"/><br /><br />
	<input type="submit" name="submit" value="" class="button_update" />

</form>
</div>


</body>
</html>