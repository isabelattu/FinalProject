<?php
$host="localhost"; //replace with database hostname
$username="root"; //replace with database username
$password=""; //replace with database password
$db_name="final"; //replace with database name
 
$con=mysql_connect($host,$username,$password)or die("cannot connect");
mysql_select_db($db_name,$con)or die("cannot select DB");

//Running and connecting to the query
	/*$id = $_REQUEST['id'];
	
	$query = "SELECT * FROM final_gallery_info_table where image_number= '$id'";
	$result = mysql_query($query);
 
    //echo $result;
	
	if($result == FALSE) {
    die(mysql_error("Cannot connect to query")); 
}

	//while($info = mysql_fetch_array($result)){

		$data = array();
 while($row = mysql_fetch_array($result)){
  $row_data = array(
   'image_name' => $row['image_name'], 
   'image_number' => $row['image_number'],
    'qrcode' => $row['qrcode'],
    'description' => $row['description'],
	'order' => $row['order']
   );
  array_push($data, $row_data);
 }
 
 echo json_encode($data);
		
			/*echo $info['image_name'];
		    echo $info['image_number'];
			echo $info['qrcode'];
		    echo $info['description'];
		    echo $info['order'] ."</td></tr>";		
			echo $info = mysql_fetch_array($result);*/
		
mysql_close($con);
	
	
?>

