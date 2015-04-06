<?php
	include_once("vid2.php");
	$id = $_REQUEST['id'];
	
	$query = "SELECT * FROM final_gallery_info_table where gid = '$id'";
	$result = mysql_query($query);
 
    echo $result;
	if($result == FALSE) {
    die(mysql_error("error message for the user")); 
}

	while($info = mysql_fetch_array($result)){
		echo"<h3>". $info['image_name'] . "</h3>";
		echo"<h3>". $info['image_number'] . "</h3>"; 
		echo"<h3>". $info['grcode'] . "</h3>";
		echo"<h3>". $info['description'] . "</h3>";
		echo"<h3>". $info['order'] . "</h3>";
}
?>