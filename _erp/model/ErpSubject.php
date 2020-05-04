<?php

class ErpSubject {
    
    public $ids;
	public $nameSurname;
	public $address;
	public $postCode;
	public $taxNumber;
	
	public function __construct($ids, $nameSurname, $address, $postCode, $taxNumber)
	{
		$this->ids = $ids;
		$this->nameSurname = $nameSurname;
		$this->address = $address;
		$this->postCode = $postCode;
		$this->taxNumber = $taxNumber;
	}
}