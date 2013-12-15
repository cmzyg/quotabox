<?php

require_once('configuration.php');
require_once('autoloader.php');

$email = $_SESSION['email'];

$database = new Database;
$categories = new Categories;

if(!isset($email)) {
  header('Location: http://www.quotabox.co.uk');
}

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
<link rel='stylesheet' href='css/style.css' />

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="bootstrap/css/styles.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="bootstrap/js/boostrap.js"></script>
<script>
$(document).ready(function(){
  $(".container_full_width").mouseover(function(){
  $(this).css("background-color", "#D8D8D8");
  });
});

$(document).ready(function(){
  $(".container_full_width").mouseout(function(){
  $(this).css("background-color", "#FFFFFF");
  });
});

</script>

<style>
body {
  font-family: 'aller_lightregular';
}
</style>

</head>

<body>

	<?php include_once('analyticstracking.php'); ?>
    <?php include_once('navigation2.php'); ?>



    <br />
    <hr />
<?php
$size = 0;
$total_size = 0;
$database->query("SELECT DISTINCT name FROM files WHERE type = 'document' and email = '$email' ORDER BY id DESC");
$row = $database->resultset();
$numrows = $database->rowCount();
foreach($row as $documents) {
   $documents = implode(' ', $documents);
   $size = $categories->getFileSize('upload/documents/'.$documents.'');
   $total_size = $size + $total_size;
   echo "<div class='container_full_width'><div class='container highlight'><div class='row'><div class='col-md-12 text-left padd'><a href='download_document?file=".$documents."'>".$documents."</div></div>";
   echo "<div class='row'><div class='col-md-12 pull-left padd'>

   </a>



   <form method='POST' action='remove'>
   <input type='hidden' name='type' value='document' />
   <input type='hidden' name='name' value='". $documents . "' />
   <a href='download_document?file=".$documents."'><input type='button' name='submit' class='btn btn-success' value='Download' /></a> <input type='submit' name='submit' class='btn btn-primary' value='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Edit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' /> <input type='submit' name='submit' class='btn btn-danger' value='&nbsp;&nbsp;&nbsp;Delete&nbsp;&nbsp;&nbsp;' />
   </form>



   </div></div></div></div>";
   
   /* echo "<br /><div class='container'><div class='row'><div class='col-md-12 text-left'>" . $documents . " [" . (int)$size . " kB]</div></div></div>"; */
   /* echo "<p><div class='container'><div class='row'><div class='col-md-12 text-left'><form method='POST' action='download_document?file=".$documents."'><input type='submit' name='submit' class='download' value=''></form>&nbsp;&nbsp;&nbsp;&nbsp;<a href='remove.php?name=" . $documents . "&file_type=document'><div class='delete'></div></a>&nbsp;&nbsp;&nbsp;&nbsp;<form method='POST' action='edit?edit_file=".$documents."&type=documents'><input type='submit' name='submit' class='edit' value=''></form></div></div></div></div><hr /></p>"; */
   echo "<hr />";
}





if($numrows == 0) {
	echo '<br /><br /><div class="container"><div class="row"><div class="col-md-12 text-center">No files</div></div></div>';
}
else {
    $total_size = $total_size / 3000000;
    $total_size = number_format($total_size, 2);
    echo "<div class='container'><div class='row'><div class='col-md-12 text-center'>Total size of this folder: " . $total_size . " MB</div></div></div>";
}

 
?>


</body>
</html>