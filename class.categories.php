<?php

class Categories {

public $max_size = 50;
public $current_size;
public $space_left;

public $overdraft;

public $quota = 100;

public $file;

public function spaceLeft($current_size) {
    $this->current_size = $current_size;
    $this->space_left = $this->max_size - $this->current_size;
    $this->space_left < 0 ? $this->space_left = 0 : $this->space_left = $this->space_left;
    return number_format($this->space_left, 2);
}

public function spaceOverdraft($curret_size, $max_size) {
	$this->max_size = $max_size;
	$this->current_size = $current_size;
    $this->overdraft = $this->max_size - $this->current_size;
    $this->overdraft = $this->overdraft * (-1);
    return $this->overdraft;
}



public function calculateQuotaPercentageUsed() {
    $this->quota = $this->quota * $this->space_left / 100;
    $this->quota = 100 - $this->quota;
    return $this->quota;
}

public function getFileSize($file) {
    $this->file = filesize($file);
    return $this->file;
}

}

?>