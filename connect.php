<!DOCTYPE html>
<html>
<head>
	<title>Code-paste.io</title>
</head>
<body style="background:white">
<?php
$servername="localhost";
$username="root";
$password="";
$db="delta";
$conn=mysqli_connect($servername,$username,$password,$db);
if(!$conn){
	echo "Connection failed";
}
if(isset($_POST['reg'])){
	Register();
}
if(isset($_POST['signin'])){
	Signin();
}
/*else
	echo "ESTABLISHED Connection";*/
function Register(){
	$servername="localhost";
	$username="root";
	$password="";
	$db="delta";
	$query=mysqli_query(mysqli_connect($servername,$username,$password,$db),"SELECT * FROM details where username='{$_POST["user"]}' AND password='{$_POST["pass"]}' ") or die(mysqli_error());
	$check=mysqli_query(mysqli_connect($servername,$username,$password,$db),"SELECT * FROM details where username='{$_POST["user"]}'") or die(mysqli_error());
	$numResults=mysqli_num_rows($check);
	if($numResults==0){
		$sql=mysqli_query(mysqli_connect($servername,$username,$password,$db),"INSERT INTO details(username,password)
						 VALUES('{$_POST["user"]}','{$_POST["pass"]}')");
		echo "Id created; logout and return again";
	}
/*$sql="INSERT INTO details(username,password)
VALUES($x,$y)";*/
	else{
		echo "Username already taken";
		$_POST["user"]=NULL;
	}
	//header("Location:/Signin.php");
}
function Signin(){
	$servername="localhost";
	$username="root";
	$password="";
	$db="delta";

	session_start();
	if(!empty($_POST["user"])){
		$query=mysqli_query(mysqli_connect($servername,$username,$password,$db),"SELECT* FROM details where username='{$_POST["user"]}' AND password='{$_POST["pass"]}' ") or die(mysqli_error());
		$row = mysqli_fetch_array($query) or die(mysql_error());
		if(mysqli_num_rows($query)){
			if(!empty($row["username"]) AND !empty($row["password"])) {
				$_SESSION['username'] = $row['password'];
				echo " Logged To user profile page...";
			}
		}
		else
		{
			echo "The entered username/password is wrong";	
		}
	}
}


mysqli_close($conn);
?>
<br><br>
<form method="post" action="new.php" enctype="multipart/form-data">
<textarea name="ta" placeholder="Paste your code here" style="color:red;background: black;border:2px red;font-size: 200%; " rows="20" cols="60">
</textarea>
 <input type="text" name="user" value="<?php echo $_POST["user"];?>" style="display: none;">
 <input type="text" name="pass" value="<?php echo $_POST["pass"];?>" style="display: none;">
 <br><br><input type="submit" name="finish" value="Submit code" >

</form>
</body>
</html>

