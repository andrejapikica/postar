<?php

include '../connection.php';
include "model/AutSubject.php";

class Aut 
{
	private function _getByIds($id) {
		$id = intval($id);		
		$db = Db::getInstance();
		$result = mysqli_query($db,"SELECT * FROM auts where ids=$id");
		if ($row = mysqli_fetch_assoc($result)) {
			return new AutSubject(
				$row['ids'], 
				$row['nameSurname']
			);
		}
		return null;
  	}
	
	public function saveAut($subject) {

		try {
			$now = date('Y-m-d H:i:s');
			$db = Db::getInstance();

			$orig = $this->_getByIds($subject->ids);
			if($orig == null) {
				if ($stmt = mysqli_prepare($db, "insert into auts (ids, nameSurname, created_at) values (?, ?, ?)")) {
					mysqli_stmt_bind_param($stmt, "iss", 
						$subject->ids, 
						$subject->nameSurname, 
						$now
					);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_close($stmt);
				}
				$id=mysqli_insert_id($db);

			} else {
				$orig->nameSurname = $subject->nameSurname;
				if ($stmt = mysqli_prepare($db, "UPDATE auts SET nameSurname=?, updated_at=? WHERE ids=?")) {
					mysqli_stmt_bind_param($stmt, "ssi", $orig->nameSurname, $now, $orig->ids);
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

$options = ['uri' => 'https://incubator.alcyone.si/soaptest/aut/'];
$server = new SoapServer(null, $options);
$server->setClass('Aut');
$server->handle();