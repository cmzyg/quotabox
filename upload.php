<?php

require_once('configuration.php');
require_once('autoloader.php');
require_once('settings.php');

$database = new Database;
$validate = new Validate;

$post_description = $_POST['description'];
$description = $validate->escapeString($post_description);


$size = 0;
$total_size_documents = 0;
$database->query("SELECT name FROM files WHERE type='document' AND email = '$email' ORDER BY id DESC");
$row = $database->resultset();
$numrows = $database->rowCount();
foreach($row as $files) {
   $files = implode(' ', $files);
   $size = $categories->getFileSize('upload/documents/'.$files.'');
   $total_size_documents = $size + $total_size_documents;
}

$size = 0;
$total_size_music = 0;
$database->query("SELECT name FROM files WHERE type='music' AND email = '$email' ORDER BY id DESC");
$row = $database->resultset();
$numrows = $database->rowCount();
foreach($row as $files) {
   $files = implode(' ', $files);
   $size = $categories->getFileSize('upload/music/'.$files.'');
   $total_size_music = $size + $total_size_music;
}

$size = 0;
$total_size_photos = 0;
$database->query("SELECT name FROM files WHERE type='photo' AND email = '$email' ORDER BY id DESC");
$row = $database->resultset();
$numrows = $database->rowCount();
foreach($row as $files) {
   $files = implode(' ', $files);
   $size = $categories->getFileSize('upload/photos/'.$files.'');
   $total_size_photos = $size + $total_size_photos;
}


$final_size = $total_size_documents + $total_size_music + $total_size_photos;
$final_size = $final_size / 1000000;
$final_size = number_format($final_size, 2);
if($final_size > 100) {
   header('Location: limit');
   exit();
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

<link rel='stylesheet' href='style.css' />
</head>

<body>

<div class="top_bar">
    <div class="navigation"><?php include('navigation.php'); ?></div>
</div>
<div class="lower_bar"></div>

<?php

if ($_FILES["file"]["error"] > 0)
   {
   echo "Error: " . $_FILES["file"]["error"] . "<br>";
   }
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
      && $extension !=='docx' && $extension !=='doc' && $extension !=='php' && $extension !=='pdf') {
      $file_directory = 'upload/other';
      $file_type = 'other';
   }
   else {
      $foo = NULL;
   }

   echo "<br />Filename: " . $_FILES["file"]["name"] . "<br>";
   echo "Size: " . number_format(($_FILES["file"]["size"] / 1024), 2) . " kB<br>";
   }
   
   
if (file_exists("upload/" . $_FILES["file"]["name"]))
   {
   echo $_FILES["file"]["name"] . " already exists. ";
   }
   else
   {
   move_uploaded_file($_FILES["file"]["tmp_name"], $file_directory . "/" . $_FILES["file"]["name"]);
   echo "Stored in: " . $file_type . " folder";
   $database->query("INSERT INTO files (name, type, description) VALUES (:name, :file_type, :description)");
   $database->bind(':name', $_FILES["file"]["name"]);
   $database->bind(':file_type', $file_type);
   $database->bind(':description', $description);
   $database->execute();
   }
      
     
?>

</body>
</html>