<?php
$servername="localhost";
$username="root";
$password="";
$db="delta";
$sno = intval($_GET["id"]) ;
$query  = mysqli_query(mysqli_connect($servername,$username,$password,$db),"SELECT code FROM details WHERE id=$sno") ;
$row = mysqli_fetch_assoc($query) ;
if(!empty($row["code"]))
	echo $row["code"] ;
else
	echo "Empty code";
?>
