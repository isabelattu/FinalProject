<?php
$host="localhost"; //replace with database hostname
$username="csashesi_ia15"; //replace with database username
$password="db!1537b8"; //replace with database password
$db_name="csashesi_isabel-attu"; //replace with database name
 
$con=mysql_connect($host,$username,$password)or die("cannot connect");
mysql_select_db($db_name,$con)or die("cannot select DB");

/*
$host="localhost"; //replace with database hostname
$username="csashesi_ia15"; //replace with database username
$password="db!1537b8"; //replace with database password
$db_name="csashesi_isabel-attu"; //replace with database name
 
$con=mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");
$sql = "select count(*) as total from person where attendance_status ='1'";
$result = mysql_query($sql);
 
$row=mysql_fetch_assoc($result);
echo $row["total"];
*/

mysql_close($con);
	
	
?>

