<?php
class Subject {
	
	public $ids;
	public $name;
	public $surname;
	public $address;
	public $postCode;
	public $postName;
	public $taxNumber;
	public $phone;
	
	public function __construct($ids, $name, $surname, $address, $postCode, $postName, $taxNumber, $phone)
	{
		$this->ids      = $ids;
		$this->name 	= $name;
		$this->surname  = $surname;
		$this->address  = $address;
		$this->postCode = $postCode;
		$this->postName = $postName;
		$this->taxNumber= $taxNumber;
		$this->phone    = $phone;
    }
    
}