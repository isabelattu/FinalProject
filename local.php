<?php
	$host="localhost"; //replace with database hostname
	$username="root"; //replace with database username
	$password=""; //replace with database password
	$db_name="final"; //replace with database name
	 
	$con=mysql_connect($host,$username,$password)or die("cannot connect");
	mysql_select_db($db_name,$con)or die("cannot select DB");
	//include_once("vid3.php");
	
	
	$cmd = $_REQUEST['cmd'];
	if($cmd==1){
	$code = $_REQUEST['code'];
	$name = $_REQUEST['name'];
	$number = $_REQUEST['number'];
	$date = strftime('%c');
	//print $date;
	$email = $_REQUEST['email'];
	$iname = $_REQUEST['iname'];
	$inum =  $_REQUEST['inum'];
	$imid =  $_REQUEST['imid'];
	mysql_query("insert into order_table(oid,image_name,image_id,order_date,buyer_name,email,order_status,buyer_code,buyer_contact) VALUES ('$iname','$inum','$imid','$date','$name','$email','1','$code','$number')")
		or die(mysql_error());
		
		echo "item has been ordered";
		return;
		}
	
	
	if($cmd==2){
		$id = $_REQUEST['id'];
       $result =  mysql_query("SELECT * FROM final_gallery_info_table where image_number= '$id'")
		or die(mysql_error());
		
		$meeting = mysql_fetch_array($result);
		$data = array();
	  if(!$meeting){
	  echo '{"result":0, "message":"Details not found"}';
	  return;
	  }
	  
	 $data = array();
   while($meeting){
   $data['event'][] = $meeting;
   $meeting = mysql_fetch_array($result);
 }
 /**
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
 **/
 
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
		
		
	?>