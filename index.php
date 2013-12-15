<?php

require_once('configuration.php');
require_once('autoloader.php');

$database = new Database;
$categories = new Categories;

if(isset($_SESSION['email'])) {
	$email = $_SESSION['email'];

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
$final_size = $final_size / 30000000;
$final_size = number_format($final_size, 0);

$final_size > 100 ? $final_size = 100 : $final_size = $final_size;
$final_size = 33;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset='UTF-8'>
<meta name='author' content='quotabox.co.uk'>
<meta name='description' content='File storage and exchange'>
<meta name='keywords' content='<?php echo $keywords; ?>'>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $title; ?></title>
<link rel='stylesheet' href='css/style.css' />
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="bootstrap/css/styles.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="bootstrap/js/boostrap.js"></script>

<script src='js/functions.js'></script>



<style>

body {
    font-family: 'aller_lightregular';
}



.center {
	display: none;
	height: 100%;
}

.center_login {
	display: none;
	height: 100%;
}

.rel {
	position: absolute;
	z-index: 3;
	width: 100%;
}
.header1 {
	width: 100%;
	height: auto;
}

#hidden_error_name {

    width: auto;
    height: auto;
    margin-right: 10%;
	float: right;
	color: red;
}

#hidden_error_surname {

    width: auto;
    height: auto;
    margin-right: 10%;
	float: right;
	color: red;
}

#hidden_error_password {

    width: auto;
    height: auto;
    margin-right: 10%;
	float: right;
	color: red;
}

#hidden_error_email {

    width: auto;
    height: auto;
    margin-right: 10%;
	float: right;
	color: red;
}

#hidden_error_name2 {

display: none;
}

#hidden_error_surname2 {

display: none;
}

#hidden_error_password2 {

display: none;
}

#hidden_error_email2 {

display: none;
}

#hidden_error_password_login2 {
display: none;
}

#hidden_error_email_login2 {
display: none;
}

#hidden_error_password_login {

  width: auto;
  height: auto;
  margin-right: 10%;
  float: right;
  color: red;
}

#hidden_error_email_login {

  width: auto;
  height: auto;
  margin-right: 10%;
  float: right;
  color: red;
}

.min {
  min-width: 200px;
}

.max {
  max-width: 70%;
  margin: 0 auto;
}
</style>

<script>


$(document).ready(function(){
  $(".nav4").click(function(){
  $(".center_login").fadeIn(2000);
  $(".center").fadeOut(1000);
  $('html, body').animate({scrollTop:$('.center_login').position().top}, 1500);
  });
});

$(document).ready(function() {
$('.summernote').summernote({
  height: 300,   //set editable area's height
  focus: true    //set focus editable area after Initialize summernote
});
});







</script>
</head>

<body>

	<?php include_once('analyticstracking.php'); ?>

<div class="header1"><div class="rel">
<?php if(isset($_SESSION['email'])) { ?><!--<div class="progress">
           <div class="progress-bar progressbar-success" role="progressbar" aria-valuenow="<?php echo $final_size; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $final_size; ?>%;">
             <span class="sr-only">60% Complete</span>
           </div>
         </div>--><?php } ?><br />

         

	<div class="nav">
		<?php if(isset($_SESSION['email'])) { ?>
			<a href="logout"><div class="nav5">LOGOUT</div></a>
			<a href="files"><div class="nav3">FILES&nbsp;&nbsp;&nbsp;</div></a>
			<a href="file-upload"><div class="nav2">UPLOAD&nbsp;&nbsp;&nbsp;</div></a>
		    <a href="http://www.quotabox.co.uk"><div class="nav1">HOME&nbsp;&nbsp;&nbsp;</div></a>



		<?php } else { ?>
		<div class="nav4"></div>
		<?php } ?>
	</div>
				<!--<div class="logo_responsive">
	        <img src="image/quotabox_loggedin.png" class="img-responsive" />
        </div>-->

        <!--<div class="summernote">Hello Summernote</div>-->

	<?php if(!isset($_SESSION['email'])) { ?>

		<br /><br />
<div class="container hidden-xs"><div class="row"><div class="col-xs-8"></div>
<div class="col-xs-4">
  <form action="join" method="POST" name="form1" onsubmit="return validateForm()">
  <div class="form-group">
    <div id="hidden_error_name2"><div id="hidden_error_name">Please input name</div><br /></div>
    <input type="text" name="name" class="form-control" id="name" oninput="removeError()" placeholder="Name">
  </div>
  <div class="form-group">
    <div id="hidden_error_surname2"><div id="hidden_error_surname">Please input last name</div><br /></div>
    <input type="text" name="surname" class="form-control" id="surname" oninput="removeError()" placeholder="Last Name">
  </div>
   <div class="form-group">
    <div id="hidden_error_password2"><div id="hidden_error_password">Please input password</div><br /></div>
    <input type="password" name="password" class="form-control" id="password" oninput="removeError()" placeholder="Password">
  </div>
   <div class="form-group">
    <div id="hidden_error_email2"><div id="hidden_error_email">Please input email</div><br /></div>
    <input type="text" name="email" class="form-control" id="email" oninput="removeError()" placeholder="Email">
  </div>


  <input type="submit" name="submit" class="btn btn-success" value="Join Now" />
</form>
</div></div></div>
<?php } ?>



</div>
<img src="image/banner.jpg" class="img-responsive" />

</div>




<!--<div class="quota"><div class="inside_quota"><span><br /><?php echo $categories->calculateQuotaPercentageUsed() . "% Used"; ?></span></div></div>-->




<?php

$categories->spaceLeft('20');



/*
$database->query('SELECT name FROM categories WHERE member_name = :member_name');
$database->bind(':member_name', 'Zygimantas');
$row = $database->single();
$row = implode(' ', $row);
echo $row;



$database->query('INSERT INTO categories (name, member_name) VALUES (:name, :member_name)');
$database->bind(':name', 'documents');
$database->bind(':member_name', 'Tautvilas');
$database->execute();
echo $database->lastInsertId();

*/

?>
<div class='center_login'>

<div class='clearfix'></div>
<div class='container'>
  <div class='row'>
    <div class='col-sm-4'></div>
    <div class='col-sm-4'>

<h1 class='text-center'>Login</h1>
<!--
<form method="POST" action="login" name="login_form" onsubmit="return validateLogin()" />
<div id="hidden_error_email_login2"><div id="hidden_error_email_login">Please input email</div><br /></div>
<input type="text" class="join_form" id="email" name="email" placeholder="Email" onfocus="changeBorderEmail()" onblur="returnBorderEmail()" /><br /><br />
<div id="hidden_error_password_login2"><div id="hidden_error_password_login">Please input password</div><br /></div>
<input type="password" class="join_form" id="password" name="password" placeholder="******" onfocus="changeBorderPassword()" onblur="returnBorderPassword()" /><br /><br />
<input type="submit" name="submit" class="btn btn-success btn-lg" value="Log In" />
</form>
-->

<form method="POST" action='login' name='login_form' onsubmit='return validateLogin()'>
<div class='form-group'>
<input type='text' name='email' placeholder='Email' class='form-control' id='email' />
</div>
<div class='form-group'>
<input type='password' name='password' placeholder='Password' class='form-control' id='password' />
</div>
<div class='form-group'>
  <input type="submit" name="submit" class="btn btn-success btn-md" value="Log In" />
</div>
</div>
</form>
    <div class='col-sm-4'></div>
</div>
</div>

</div>








</body>
</html>
