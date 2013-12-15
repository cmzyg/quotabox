<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

require_once('config.php');
require_once('autoloader.php');
require('settings.php');

$database = new Database;
$categories = new Categories;

?>

<!doctype html>
<html lang="en">
<head>
<meta charset='UTF-8'>
<meta name='author' content='Zygimantas Simkus'>
<meta name='description' content='File storage and exchange'>
<meta name='keywords' content='file, files, exchange, store, upload, retrieve, download'>
<title><?php echo $title; ?></title>

<link rel='stylesheet' src='style.css' />
</head>

<body>

<div class='documents'><a href='documents.php'>Documents</a></div>
<div class='music'><a href='music.php'>Music</a></div>
<div class='photos'><a href='photos.php'>Photos</a></div>


<?php

$current_size = 200;
$max_size = 500;
$space_left = $categories->spaceLeft($current_size, $max_size);

$overdraft = $categories->overdraft($current_size, $max_size);

echo "Space left ";
echo $space_left;
echo "<br />";
echo "Overdraft ";
echo $overdraft;

?>

<p>Upload a file</p>
<form action="upload_file.php" method="post" enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file"><br>
<input type="submit" name="submit" value="Submit">
</form>

</body>
</html>
