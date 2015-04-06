<?php
	include_once("vid2.php");
	//$query="insert into customer_table set name='$name', number=$number, 
			//booking_time='$booking_time', task='$task', attendant = $attendant, address = $address";
	//$query = "SELECT * FROM customer_table";
	$cmd = $_REQUEST['cmd'];
	
	if($cmd==1){
	$name = $_POST['na'];
	$number = $_POST['np'];
	$date = $_POST['od'];
	$email = $_POST['em'];
	
	mysql_query("insert into order_table(oid,image_name,image_id,order_date,email,order_status) values ('{$name}','{$number}','{$date}','{$email}'")
		or die("mysql_error())");
		
		echo "User has been added!";
		}
	
	$id = $_REQUEST['id'];
	if($cmd==2){
       $result =  mysql_query("SELECT * FROM final_gallery_info_table where image_number = '$id'")
		or die(mysql_error());
		
		$meeting = mysql_fetch_array($result);
		$data = array();
	  if(!$meeting){
	  echo '{"result":0, "message":"Details not found"}';
	  return;
	  }
	  
	  while($meeting){
	  $data['event'][]=$meeting;
		echo"<h3>". $meeting['image_name'] . "</h3>";
		echo"<h3>". $meeting['image_number'] . "</h3>"; 
		echo"<h3>". $meeting['grcode'] . "</h3>";
		echo"<h3>". $meeting['description'] . "</h3>";
		echo"<h3>". $meeting['order'] . "</h3>";
		$meeting = mysql_fetch_array($result);
}
		}

	if($cmd==3){
$code = $_REQUEST['code'];

if(!$code){
	echo "	please insert your registration code";
}
$result = mysql_query("UPDATE person
SET attendance_status= '1' WHERE code=$code");
	echo "marked Present!";
	}	
		
		
	?>