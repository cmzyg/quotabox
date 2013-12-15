<?php

function __autoload($classname) {

$filename = 'class.' . $classname . '.php';
$filename = strtolower($filename);

require_once($filename);

}

?>