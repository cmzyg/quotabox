<?php

require_once('configuration.php');
require_once('autoloader.php');

$email = $_SESSION['email'];

$database = new Database;


$database->query("SELECT DISTINCT name FROM files WHERE type = 'document' AND email = '$email'");
$row = $database->single();
$document_count = $database->rowCount();

$database->query("SELECT DISTINCT name FROM files WHERE type = 'music' AND email = '$email'");
$row = $database->single();
$music_count = $database->rowCount();

$database->query("SELECT DISTINCT name FROM files WHERE type = 'photo' AND email = '$email'");
$row = $database->single();
$photo_count = $database->rowCount();

$database->query("SELECT DISTINCT name FROM files WHERE type = 'other' AND email = '$email'");
$row = $database->single();
$other_count = $database->rowCount();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset='UTF-8'>
<meta name='author' content='<?php echo $author; ?>'>
<meta name='description' content='<?php echo $description; ?>'>
<meta name='keywords' content='<?php echo $keywords; ?>'>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $title; ?></title>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<link rel='stylesheet' href='bootstrap/css/bootstrap.min.css' />
<link rel='stylesheet' href='bootstrap/css/styles.css' />
<link rel='stylesheet' href='css/style.css' />
</head>

<body>

	<?php include_once('analyticstracking.php'); ?>
	<?php include_once('navigation2.php'); ?>


<h1 class="text-center">Your files</h1>


<div class="main_content">
<a href="documents"><div class="documents"><div class="number btn btn-success btn-sm"><?php echo $document_count; ?></div></div></a>
<a href="music"><div class="music"><div class="number btn btn-success btn-sm"><?php echo $music_count; ?></div></div></a>
<a href="photos"><div class="photos"><div class="number btn btn-success btn-sm"><?php echo $photo_count; ?></div></div></a>
<a href="other"><div class="other"><div class="number btn btn-success btn-sm"><?php echo $other_count; ?></div></div></a>
</div>


</body>
</html>