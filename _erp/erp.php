<?php
include '../connection.php';
include "model/ErpSubject.php";
  

class Erp 
{
	private function _getByIds($id) {
		$id = intval($id);		
		$db = Db::getInstance();
		$result = mysqli_query($db,"SELECT * FROM erps where ids=$id");
		if ($row = mysqli_fetch_assoc($result)) {
			return new ErpSubject(
				$row['ids'],
				$row['nameSurname'],
				$row['address'],
				$row['postCode'],
				$row['taxNumber']
			);
		}
		return null;
  	}
	  public function saveErp($subject) {
		try {
			$now = date('Y-m-d H:i:s');
			$db = Db::getInstance();

			$orig = $this->_getByIds($subject->ids);

			if($orig == null) {
				//$orig->nameSurname = $subject->name . " " . $subject->surname;
				if ($stmt = mysqli_prepare($db, "Insert into erps (ids, nameSurname, address, postCode, taxNumber, created_at) Values (?,?,?,?,?,?)")) {
					mysqli_stmt_bind_param($stmt, "issiis", 
											$subject->ids, 
											$subject->nameSurname, 
											$subject->address, 
											$subject->postCode, 
											$subject->taxNumber, 
											$now
					);
				   
					mysqli_stmt_execute($stmt);
					mysqli_stmt_close($stmt);
				}
				$id=mysqli_insert_id($db);

			} else {
				//$orig->nameSurname = $subject->name . " " . $subject->surname;
				if ($stmt = mysqli_prepare($db, "UPDATE erps SET nameSurname=?, address=?, postCode=?, taxNumber=?, updated_at=? WHERE ids=?")) {
					mysqli_stmt_bind_param($stmt, "ssiisi", 
											$subject->nameSurname, 
											$subject->address, 
											$subject->postCode, 
											$subject->taxNumber, 
											$now,
											$subject->ids
										);
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

$options = ['uri' => 'https://incubator.alcyone.si/soaptest/erp/'];
$server = new SoapServer(null, $options);
$server->setClass('Erp');
$server->handle();