<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

require_once('configuration.php');
require_once('autoloader.php');


$email = $_SESSION['email'];

$database = new Database;
$categories = new Categories;
$validate = new Validate;

$name = $_POST['name'];
$type = $_POST['type'];


if($type == 'document') {
	$directory = 'documents';
}
elseif($type == 'music') {
	$directory = 'music';
}
elseif($type == 'photo') {
	$directory = 'photos';
}
else {
	$directory = 'other';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset='UTF-8'>
<meta name='author' content='Zygimantas Simkus'>
<meta name='description' content='File storage and exchange'>
<meta name='keywords' content='file, files, exchange, store, upload, retrieve, download'>
<title><?php echo $title; ?></title>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="bootstrap/css/styles.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="bootstrap/js/boostrap.js"></script>

<link rel='stylesheet' href='css/style.css' />
</head>

<body>

	<?php include_once('analyticstracking.php'); ?>
    <?php include_once('navigation2.php'); ?>

<?php


$database->query("DELETE FROM files WHERE name = :name AND email = :email");
$database->bind(':name', $name);
$database->bind('email', $email);
$database->execute();

$filename = 'upload/' . $directory . '/' . $name;


if (!unlink($filename))
  {
  echo ("Error deleting $file");
  }
else
  {
  echo '<br /><br /><div class="center active">File ' . $name . ' removed</div>';
  }


      
     
?>

</body>
</html>