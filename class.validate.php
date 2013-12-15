<?php

class Validate {

public $text;
public $email;
public $variable;

// method validates if the input length is at least 10 symbols
public function length($text) {
$this->text = $text;

if(strlen($this->text) < 10) {
return FALSE;
}
else {
return TRUE;
}
}
//

// method validates if user input is not empty
public function notEmpty($text) {

$this->text = $text;

if(!empty($this->text)) {
return TRUE;
}
else {
return FALSE;
}
}
//


// method validates if the email format is correct
public function validEmail($email) {
$this->email = $email;

if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
return FALSE;
}
else {
return TRUE;
}
}
//


public function escapeString($variable) {
	$this->variable = $variable;
	return trim(strip_tags(stripslashes($this->variable)));
}


}






?>