<?php

class BilSubject {
    
    public $ids;
    public $name;
    public $surname;
    public $address;
    public $postCodeName;
    public $taxNumber;
    
    public function __construct($ids, $name, $surname, $address, $postCodeName, $taxNumber)
	 {
	 $this->ids = $ids;
	 $this->name = $name;
	 $this->surname = $surname;
	 $this->address = $address;
	 $this->postCodeName = $postCodeName;
	 $this->taxNumber = $taxNumber;
	 }
}