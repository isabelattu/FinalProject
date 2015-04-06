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
	
	mysql_query("insert into order_table(oid,image_name,image_id,order_date,email,order_status) values ('{$name}','{$number}','{$date}','{$email}')
		or die(mysql_error())");
		
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
	  $meeting = mysql_fetch_array($result);
		}
		echo json_encode($data);
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
		
		
		


	
		
	/*$result = mysql_query($query2);	
	while($person = mysql_fetch_array($result)){
		echo"<h3>". $person['name'] . "</h3>";
		echo"<h3>". $person['number'] . "</h3>"; ``
		echo"<h3>". $person['task'] . "</h3>";
		echo"<h3>". $person['attendant'] . "</h3>";
		echo"<h3>". $person['address'] . "</h3>";
	
	}*/
	?>