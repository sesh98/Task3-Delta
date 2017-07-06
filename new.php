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
	echo "<br>";
	$y;
	$query=mysqli_query(mysqli_connect($servername,$username,$password,$db),"SELECT* FROM details where username='{$_POST["user"]}' AND password='{$_POST["pass"]}' ") or die(mysqli_error());
	$result=mysqli_query(mysqli_connect($servername,$username,$password,$db),"SELECT * FROM details where username='{$_POST["user"]}' AND password='{$_POST["pass"]}' ");
	$numResults=mysqli_num_rows($result);
	$row = mysqli_fetch_array($query) or die(mysql_error());
		if(!empty($row["username"]) AND !empty($row["password"])) {
			$_SESSION['username'] = $row['password'];
			$sql="INSERT INTO details(username,password,code) VALUES('{$_POST["user"]}','{$_POST["pass"]}','{$_POST["ta"]}')";
			mysqli_query(mysqli_connect($servername,$username,$password,$db),$sql);
  			
  			
		}
			$rowSQL = mysqli_query(mysqli_connect($servername,$username,$password,$db), "SELECT MAX( id ) AS max FROM details" );
			$row = mysqli_fetch_array($rowSQL );
			$x = $row['max'];
			$hash= (rand(0,1000));
			echo "The referral code is  2k" . $x."nan".$y."<br>";
			echo "CODE  ADDED SUCCESSFULLY";
			    header("Location: displaycode.php?id=$x/2k$hash") ;

	}	
?>
