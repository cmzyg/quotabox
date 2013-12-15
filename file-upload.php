<?php

$email = $_SESSION['email'];

require_once('configuration.php');
require_once('autoloader.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name='author' content='<?php echo $author; ?>'>
<meta name='description' content='<?php echo $description; ?>'>
<meta name='keywords' content='<?php echo $keywords; ?>'>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $title; ?></title>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="bootstrap/css/styles.css" />
<link rel='stylesheet' href='css/style.css' />

</head>

<body>
    
	<?php include_once('analyticstracking.php'); ?>
	<?php include_once('navigation2.php'); ?>

<div class="center">
<h1>Upload</h1>
</div>

<br />
<div class="container">
	<div class="row">
		<div class="col-md-3 text-center"></div>
		<div class="col-md-6 text-center">

        <form name="file_upload" action="save" method="POST" enctype="multipart/form-data">
            <!--<p><input type="file" class="file_input" name="file" placeholder="Your File"></p>-->
            <input id="lefile" name="file" class="browse_field" type="file" style="display:none">
            <div class="input-append">
              <a class="btn btn-default" onclick="$('input[id=lefile]').click();">Browse Computer</a>
             <input id="photoCover" class="join_form text-center" type="text" style="display: none; border: none"> 
             <button id="close" type="button" class="close" aria-hidden="true" style="display: none;">&times;</button>
            </div>
            <br />
          
            <p><textarea name="description" class="form-control text-center" placeholder="Description (Optional)" rows="5"></textarea></p>
            <p class="pull-left"><input type="checkbox" name="important"> Mark as important</p>
            <div class="clearfix"></div>
            <p><input type="submit" name="submit" value="Upload" class="btn btn-success" /></p>
        </form>


 
<script type="text/javascript">

$('input[id=lefile]').change(function() {
$('#photoCover').css("display", "inline");
$('#close').css("display", "inline");
$('#photoCover').val($(this).val());
$('#photoCover').val().replace(/C:\\fakepath\\/i, '');
});

$('#close').click(function() {
$('#photoCover').val('');
$('#close').css('display', 'none');
$('#photoCover').css('display', 'none');
});
</script>

        </div>
        <div class="col-md-3 text-center"></div>
    </div>
</div>



</body>
</html>