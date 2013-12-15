<?php

ob_start();
session_start();

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

require_once('config.php');
require_once('autoloader.php');

$database = new Database;
$categories = new Categories;
$validate = new Validate;


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
$db_email = implode('', $db_email);

$database->query('SELECT password FROM users WHERE email = :email');
$database->bind(':email', $email);
$database->execute();
$db_password = $database->single();
$db_password = implode('', $db_password);


if($receive_password == $db_password && $receive_email == $db_email) {
	$_SESSION['email'] = $db_email;
	header('Location: http://www.quotabox.co.uk');
	exit();
}


ob_end_flush();

?>

