<?php 
require_once'./sqlcon.php';
class checkboxclass extends sqlcon {
	public function addtoDatabase($sevices){
	$insert="insert into room_book (services)values('$services')";
	$result=$this->query ($insert) or die($this->error);
	?>
	}
}