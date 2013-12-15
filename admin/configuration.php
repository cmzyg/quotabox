<?php

ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

session_start();

// TITLE SETTINGS
$base_url = $_SERVER['REQUEST_URI'];
$base_url = substr($base_url, 1);
$base_url = ucwords($base_url);
$base_url = str_replace("-", " ", $base_url);
$title = "QuotaBox.co.uk | " . $base_url;


// META INFORMATION
$keywords = 'file, files, exchange, store, upload, retrieve, download, manage, manage files, online storage, free upload';
$description = 'Quotabox - File storage and exchange';
$author = 'Quotabox.co.uk';


// DATABASE CONNECTION
define("DB_HOST", "quotabox.db.11872778.hostedresource.com");
define("DB_USER", "quotabox");
define("DB_PASS", "Penrhyn00!");
define("DB_NAME", "quotabox");

?>