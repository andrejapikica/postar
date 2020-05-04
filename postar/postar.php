<?php

include '../connection.php';
include "model/ErpSubject.php";
include "model/AutSubject.php";
include "model/BilSubject.php";
   
class Postar {	
  
	private function catchException($subject, $system, $error) {
		$db = Db::getInstance();
		$now = date('Y-m-d H:i:s');
		if ($stmt = mysqli_prepare($db, "Insert into postar_log (system, ids, name, surname, address, postCode, postName, taxNumber, phone, created_at) Values (?,?,?,?,?,?,?,?,?,?)")) {
			mysqli_stmt_bind_param($stmt, "sisssisiis", $system, $subject->ids, $subject->name, $subject->surname, $subject->address, $subject->postCode, $subject->postName, $subject->taxNumber, $subject->phone, $now);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_close($stmt);
		}
	}

   private function _saveErp($subject) {
		try {
			$client = new SoapClient("https://incubator.alcyone.si/soaptest/erp/erp.wsdl", 
				array( 
					'cache_wsdl' => WSDL_CACHE_NONE, 
					'trace' => 1
				)
			);
			return $client->__soapCall("saveErp", array(new ErpSubject($subject->ids, $subject->name . ' '. $subject->surname, $subject->address, $subject->postCode, $subject->taxNumber)));
		}  catch (HttpResponseException $ex) {
			$this->catchException($subject, "ERP", $ex->getMessage());
  		}  catch (SoapFault $ex) {
			$this->catchException($subject, "ERP", $ex->getMessage());
        }
  	}

   	private function _saveBil($subject) {
	  	try {
			$client = new SoapClient("https://incubator.alcyone.si/soaptest/bil/bil.wsdl", 
				array( 
					'cache_wsdl' => WSDL_CACHE_NONE, 
					'trace' => 1
				)
			);
			return $client->__soapCall("saveBil", array(new BilSubject($subject->ids, $subject->name, $subject->surname, $subject->address, $subject->postCode . ' ' . $subject->postName, $subject->taxNumber)));
		}  catch (HttpResponseException $ex) {
			$this->catchException($subject, "BIL", $ex->getMessage());
	  	}  catch (SoapFault $ex) {
			$this->catchException($subject, "BIL", $ex->getMessage());
		}
  	}

   	private function _saveAut($subject) {
  		try {
			$client = new SoapClient("https://incubator.alcyone.si/soaptest/aut/aut.wsdl", 
			  	array(
					'cache_wsdl' => WSDL_CACHE_NONE, 
					'trace' => 1
				)
			);
			return $client->__soapCall("saveAut", array(new AutSubject($subject->ids, $subject->name . ' '. $subject->surname)));
		}  catch (HttpResponseException $ex) {
			$this->catchException($subject, "AUT", $ex->getMessage());
		}  catch (SoapFault $ex) {
			$this->catchException($subject, "AUT", $ex->getMessage());
		}
  	}

  	public function redirect($subject) {
		try {		
			$this->_saveErp($subject);
			$this->_saveBil($subject);
			$this->_saveAUT($subject);
			return "OK";
		} catch(\Exception $ex) {
			return $ex->getMessage();
		}
	}
}

$options = ['uri' => 'https://incubator.alcyone.si/soaptest/postar/'];
$server = new SoapServer(null, $options);
$server->setClass('Postar');
$server->handle();
?>