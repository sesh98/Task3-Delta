<?php 

$servername="localhost";
$username="root";
$password="";
$db="delta";
$conn=mysqli_connect($servername,$username,$password,$db);
if(!$conn){
	echo "Connection failed";
}
if(isset($_POST["ta"])){
	code();
}

function code(){
	$servername="localhost";
	$username="root";
	$password="";
	$db="delta";
	//$content=mysqli_real_escape_string(mysqli_connect($servername,$username,$password,$db),$_POST["ta"]);
	$content=$_POST["ta"];
	echo "<br>";

	$query=mysqli_query(mysqli_connect($servername,$username,$password,$db),"SELECT* FROM details where username='{$_POST["user"]}' AND password='{$_POST["pass"]}' ") or die(mysqli_error());
	echo "Hi";
	$row = mysqli_fetch_array($query) or die(mysql_error());
		if(!empty($row["username"]) AND !empty($row["password"])) {
			echo "HI";
			$_SESSION['username'] = $row['password'];
			$sql=mysqli_query(mysqli_connect($servername,$username,$password,$db),"INSERT INTO details(code) VALUES('".mysqli_real_escape_string(mysqli_connect($servername,$username,$password,$db),$content)."')");
			echo "CODE  ADDED SUCCESSFULLY";
	}
	}
?>
