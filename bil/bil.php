<?php
include '../connection.php';
include "model/BilSubject.php";
  
class Bil 
{
	private function _getByIds($id) {
		$id = intval($id);		
		$db = Db::getInstance();
		$result = mysqli_query($db,"SELECT * FROM bils where ids=$id");
		if ($row = mysqli_fetch_assoc($result)) {
			return new BilSubject(
				$row['ids'],
				$row['name'],
				$row['surname'],
				$row['address'],
				$row['postCodeName'],
				$row['taxNumber']
			);
		}
		return null;
  	}
	
	public function saveBil($subject) {
		try {
			$now = date('Y-m-d H:i:s');
			$db = Db::getInstance();

			$orig = $this->_getByIds($subject->ids);

			if($orig == null) {
				//$orig->postCodeName = $subject->postCode . " " . $subject->postName;
				if ($stmt = mysqli_prepare($db, "Insert into bils (ids, name, surname, address, postCodeName, taxNumber, created_at) Values (?,?,?,?,?,?,?)")) {
					mysqli_stmt_bind_param($stmt, "issssis", 
											$subject->ids, 
											$subject->name, 
											$subject->surname, 
											$subject->address, 
											$subject->postCodeName, 
											$subject->taxNumber, 
											$now);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_close($stmt);
				}
				$id=mysqli_insert_id($db);

			} else {
				//$orig->postCodeName = $subject->postCode . " " . $subject->postName;
				if ($stmt = mysqli_prepare($db, "UPDATE bils SET name=?, surname=?, address=?, postCodeName=?, taxNumber=?, updated_at=? WHERE ids='$subject->ids';")) {
					mysqli_stmt_bind_param($stmt, "ssssis", $subject->name, $subject->surname, $subject->address, $subject->postCodeName, $subject->taxNumber, $now);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_close($stmt);
				}

			}

			return "OK";
		} catch(Exception $ex) {
			return "Error: " . $ex->getMessage();
		}
 	}
	      
}
$options = ['uri' => 'https://incubator.alcyone.si/soaptest/bil/'];
$server = new SoapServer(null, $options);
$server->setClass('Bil');
$server->handle();