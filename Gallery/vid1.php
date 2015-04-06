<?php
	include_once("vid2.php");
	//$query="insert into customer_table set name='$name', number=$number, 
			//booking_time='$booking_time', task='$task', attendant = $attendant, address = $address";
	$query = "SELECT * FROM final_gallery_info_table where gid = $id";
	
	$result = mysql_query($query);	
	while($info = mysql_fetch_array($result)){
		echo"<h3>". $info['image_name'] . "</h3>";
		echo"<h3>". $info['image_number'] . "</h3>"; 
		echo"<h3>". $info['grcode'] . "</h3>";
		echo"<h3>". $info['description'] . "</h3>";
		echo"<h3>". $info['order'] . "</h3>";
}
?>