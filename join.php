<?php

ob_start();

require_once('configuration.php');
require_once('autoloader.php');

$database = new Database;
$categories = new Categories;
$validate = new Validate;

$receive_name = $_POST['name'];
$name = $validate->escapeString($receive_name);

$receive_surname = $_POST['surname'];
$surname = $validate->escapeString($receive_surname);

$receive_email = $_POST['email'];
$email = $validate->escapeString($receive_email);

$receive_password = $_POST['password'];
$password = $validate->escapeString($receive_password);

$submit = $_POST['submit'];

if(!isset($submit)) {
	header('Location: http://www.quotabox.co.uk');
	exit();
}

$database->query('SELECT email FROM users WHERE email = :email');
$database->bind(':email', $email);
$database->execute();
$db_email = $database->single();
$count = $database->rowCount();


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
<link rel='stylesheet' href='style.css' />
</head>

<body>
<?php if($count == 0) { ?>
	<?php include_once('analyticstracking.php'); ?>
    <?php include_once('navigation2.php'); ?>
    <?php } ?>



<br /><br /><div class="centered_content">
<?php if($count == 0) { ?><h1>Welcome</h1><?php } else { ?> <h1>Error</h1> <?php } ?>

<div id="welcome">
	<?php if($count == 0) {

          $database->query('INSERT INTO users (name, surname, email, password) VALUES (:name, :surname, :email, :password)');
          $database->bind(':name', $name);
          $database->bind(':surname', $surname);
          $database->bind(':email', $email);
          $database->bind(':password', $password);
          $database->execute();
		  echo 'Thank You for joining us, ' . $name. ' . Confirmation with registration details will be emailed to ' . $email; 
		  echo '<br /><br />You are automatically logged in.';
		  $_SESSION['email'] = $email;

		  // sending a confirmation email
		  $subject = 'Welcome to quotabox.co.uk';
		  // Always set content-type when sending HTML email
          $headers = 'From: <admin@quotabox.co.uk>';
		  $message = '<!DOCTYPE HTML>
		  <html lang="en">
		  <head></head>
          <body>
    
          <br /><a href="http://www.quotabox.co.uk" target="_blank"><div class="header"></div></a><br /><div class="cent"><br /><br />
          Dear '.$name.',<br /><br /><br />
          Thank you for your interest in quotabox!<br /><br />
          Plese use youe email address in order to login to quotabox.<br /><br />
          </div><br /><br /><br /><br />

          </body></html>';


$to = $email;

$message = "
<html>
<head>
<title>Welcome</title>
<style>
		  .body {
 	          width: 100%;
              }

          .top_bar {
   	          width: 100%;
	          background-color: #1376bc;
	          height: 25px;
	          margin-top: 0px;
              }

          .cent {
	          width: 80%;
	          margin: 0 auto;
          }


.header {
	margin-top: 0px;
	width: 100%;
	height: 60px;
	margin: 0 auto;
	background-image: url('http://www.quotabox.co.uk/image/banner_small.jpg');
}

.logo {
	width: 50%;
	height: 146px;
	
	background-repeat: no-repeat;
	float: left;
}

.top {
	width: 100%;
	height: 146px;
}

.info {
	width: 40%;
	height: 146px;
	float: left;
	text-align: right;
}

a:link {
	color: #000000;
	text-decoration: none;
}

a:visited {
	color: #000000;
	text-decoration: none;
}

    a:active {
	    color: #000000;
	    text-decoration: none;
    }
    </style>
</head>
<body>
          <br /><a href='http://www.quotabox.co.uk' target='_blank'><div class='header'></div></a><br /><div class='cent'><br /><br />
          Dear ".$name.",<br /><br /><br />
          Thank you for your interest in quotabox!<br /><br />
          Plese use youe email address in order to login to quotabox.<br /><br />
          </div><br /><br /><br /><br />
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

// More headers
$headers .= 'From: <QuotaBox>' . "\r\n";

mail($to,$subject,$message,$headers);

	      }
		  else {
			   echo 'This email already exists!';
		  }
		?>
</div>

<?php




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

?><br /><br />

</div>


</body>
</html>

<?php ob_end_flush(); ?>
