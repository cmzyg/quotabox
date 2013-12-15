<?php

require_once('configuration.php');
require_once('autoloader.php');

$email = $_SESSION['email'];

$database = new Database;
$categories = new Categories;

$database->query('SELECT name, surname FROM users ORDER BY id DESC');
$row = $database->resultset();

$title = 'Members';

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





    <br />
    <hr />



<?php

foreach($row as $members) {
   $members = implode(" ", $members);


   echo "<div class='container_full_width'><div class='container highlight'><div class='row'><div class='col-md-12 text-left padd'>".$members."</div></div>";
   echo "<div class='row'><div class='col-md-12 pull-left padd'>



   <form method='POST' action='remove'>
   <input type='hidden' name='type' value='document' />
   <input type='hidden' name='name' value='' />
   </form>



   </div></div></div></div>";
   
   /* echo "<br /><div class='container'><div class='row'><div class='col-md-12 text-left'>" . $documents . " [" . (int)$size . " kB]</div></div></div>"; */
   /* echo "<p><div class='container'><div class='row'><div class='col-md-12 text-left'><form method='POST' action='download_document?file=".$documents."'><input type='submit' name='submit' class='download' value=''></form>&nbsp;&nbsp;&nbsp;&nbsp;<a href='remove.php?name=" . $documents . "&file_type=document'><div class='delete'></div></a>&nbsp;&nbsp;&nbsp;&nbsp;<form method='POST' action='edit?edit_file=".$documents."&type=documents'><input type='submit' name='submit' class='edit' value=''></form></div></div></div></div><hr /></p>"; */
   echo "<hr />";
}


 
?>


</body>
</html>