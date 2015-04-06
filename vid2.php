<?php
$host="localhost"; //replace with database hostname
$username="csashesi_ia15"; //replace with database username
$password="db!1537b8"; //replace with database password
$db_name="csashesi_isabel-attu"; //replace with database name
 
$con=mysql_connect($host,$username,$password)or die("cannot connect");
mysql_select_db($db_name,$con)or die("cannot select DB");
echo "connected";

//Running and connecting to the query
	$id = $_REQUEST['id'];
	
	$query = "SELECT * FROM final_gallery_info_table where gid = '$id'";
	$result = mysql_query($query);
 
    //echo $result;
	
	if($result == FALSE) {
    die(mysql_error("Cannot connect to query")); 
}

	while($info = mysql_fetch_array($result)){
		echo"<h3>". $info['image_name'] . "</h3>";
		echo"<h3>". $info['image_number'] . "</h3>"; 
		echo"<h3>". $info['grcode'] . "</h3>";
		echo"<h3>". $info['description'] . "</h3>";
		echo"<h3>". $info['order'] . "</h3>";
	}	
?>