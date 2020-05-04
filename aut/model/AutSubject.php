<?php

class AutSubject {
    
    public $ids;
	public $nameSurname;
	
	public function __construct($ids, $nameSurname) {
        $this->ids = $ids;
        $this->nameSurname = $nameSurname;
    }
}