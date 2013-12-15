<?php

require_once('configuration.php');
require_once('autoloader.php');

$database = new Database;
$validate = new Validate;

$receive_description = $_POST['description'];
$description = $validate->escapeString($receive_description);


if(isset($_POST['important'])) {
   $important = '1';
}
else {
   $important = '0';
}

$email = $_SESSION['email'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name='author' content='<?php echo $author; ?>'>
<meta name='description' content='<?php echo $description; ?>'>
<meta name='keywords' content='<?php echo $keywords; ?>'>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $title; ?></title>

<link rel='stylesheet' href='style.css' />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="bootstrap/css/styles.css" />
<link rel='stylesheet' href='css/style.css' />

</head>

<body>

<?php include_once('navigation2.php'); ?>

<div class="center">
<?php

if ($_FILES["file"]["error"] > 0)
   {
   echo "Error: " . $_FILES["file"]["error"] . "<br>";
   }
/*elseif (file_exists($file_directory . "/" . $_FILES["file"]["name"]))
   {
   echo $_FILES["file"]["name"] . " already exists. ";
   }*/
else
   {
   $extension = substr($_FILES["file"]["name"], strrpos($_FILES["file"]["name"], '.') + 1);
   $extension == 'mp3' ? $file_directory = 'upload/music' : $foo = NULL;
   $extension == 'mp3' ? $file_type = 'music' : $foo = NULL;
   $extension == 'psd' ? $file_directory = 'upload/photos' : $foo = NULL;
   $extension == 'psd' ? $file_type = 'photo' : $foo = NULL;
   $extension == 'bmp' ? $file_directory = 'upload/photos' : $foo = NULL;
   $extension == 'bmp' ? $file_type = 'photo' : $foo = NULL;
   $extension == 'jpg' ? $file_directory = 'upload/photos' : $foo = NULL;
   $extension == 'jpg' ? $file_type = 'photo' : $foo = NULL;
   $extension == 'JPG' ? $file_directory = 'upload/photos' : $foo = NULL;
   $extension == 'JPG' ? $file_type = 'photo' : $foo = NULL;
   $extension == 'gif' ? $file_directory = 'upload/photos' : $foo = NULL;
   $extension == 'gif' ? $file_type = 'photo' : $foo = NULL;
   $extension == 'png' ? $file_directory = 'upload/photos' : $foo = NULL;
   $extension == 'png' ? $file_type = 'photo' : $foo = NULL;
   $extension == 'docx' ? $file_directory = 'upload/documents' : $foo = NULL;
   $extension == 'docx' ? $file_type = 'document' : $foo = NULL;
   $extension == 'doc' ? $file_directory = 'upload/documents' : $foo = NULL;
   $extension == 'doc' ? $file_type = 'document' : $foo = NULL;
   $extension == 'php' ? $file_directory = 'upload/documents' : $foo = NULL;
   $extension == 'php' ? $file_type = 'document' : $foo = NULL;
   $extension == 'pdf' ? $file_directory = 'upload/documents' : $foo = NULL;
   $extension == 'pdf' ? $file_type = 'document' : $foo = NULL;

   if($extension !== 'mp3' && $extension !=='psd' && $extension !=='bmp' && $extension !=='jpg' && $extension !=='gif' && $extension !=='png' 
      && $extension !=='docx' && $extension !=='doc' && $extension !=='php' && $extension !=='pdf' && $extension !=='JPG') {
      $file_directory = 'upload/other';
      $file_type = 'other';
   }
   else {
      $foo = NULL;
   }

   echo "<br />Filename: " . $_FILES["file"]["name"] . "<br>";
   echo "Size: " . number_format(($_FILES["file"]["size"] / 1024), 2) . " kB<br>";


   move_uploaded_file($_FILES["file"]["tmp_name"], $file_directory . "/" . $_FILES["file"]["name"]);
   echo "Stored in: " . $file_type . ' folder';
   $database->query("INSERT INTO files (name, type, description, email, important) VALUES (:name, :file_type, :description, :email, :important)");
   $database->bind(':name', $_FILES["file"]["name"]);
   $database->bind(':file_type', $file_type);
   $database->bind(':description', $description);
   $database->bind(':email', $email);
   $database->bind(':important', $important);
   $database->execute();
   }
      
     
?>
</div>
</body>
</html>