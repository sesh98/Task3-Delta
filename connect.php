<!DOCTYPE html>
<html>
<head>
	<title>Code-paste.io</title>
</head>
<body style="background:blue;">
<?php
$servername="localhost";
$username="root";
$password="";
$db="delta";
$conn=mysqli_connect($servername,$username,$password,$db);
if(!$conn){
	echo "Connection failed";
}
if(isset($_POST["reg"])){
	Register();
}
if(isset($_POST["signin"])){
	Signin();
}
/*else
	echo "ESTABLISHED Connection";*/
function Register(){
	$servername="localhost";
	$username="root";
	$password="";
	$db="delta";
	$sql=mysqli_query(mysqli_connect($servername,$username,$password,$db),"INSERT INTO details(username,password)
						 VALUES('{$_POST["user"]}','{$_POST["pass"]}')");
/*$sql="INSERT INTO details(username,password)
VALUES($x,$y)";*/
}
function Signin(){
	$servername="localhost";
	$username="root";
	$password="";
	$db="delta";
	$in=false;
	session_start();
	if(!empty($_POST["user"])){
		$query=mysqli_query(mysqli_connect($servername,$username,$password,$db),"SELECT* FROM details where username='{$_POST["user"]}' AND password='{$_POST["pass"]}' ") or die(mysqli_error());
		$row = mysqli_fetch_array($query) or die(mysql_error());
		if(!empty($row["username"]) AND !empty($row["password"])) {
			$_SESSION['username'] = $row['password'];
			$in=true;
			echo "SUCCESSFULLY Logged TO USER PROFILE PAGE...";
		}
	}
	if(!$in) {
		echo "Incorrect username/password";
		//require 'Signin.php';
	}
}


mysqli_close($conn);
?>
<br><br>
<form method="post" action="new.php">
<textarea name="ta" placeholder="Paste your code here" style="color:red;background: black;border:2px red;font-size: 200%; " rows="20" cols="60">
</textarea>
<input type="text" name="user" value="<?php echo $_POST["user"];?> " style="display: none;">
<input type="text" name="pass" value="<?php echo $_POST["pass"];?>" style="display: none;">
<input type="submit" name="finish" value="Submit code" >
</form>
</body>
</html>

