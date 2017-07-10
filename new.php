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
		if($_POST["user"]!=NULL)
			code();
		else
			header("Location:/Signin.php");
}

function code(){
	$servername="localhost";
	$username="root";
	$password="";
	$db="delta";
	echo "<br>";
	$y;
	$query=mysqli_query(mysqli_connect($servername,$username,$password,$db),"SELECT * FROM details where username='{$_POST["user"]}' AND password='{$_POST["pass"]}' ") or die(mysqli_error());
	$numResults=mysqli_num_rows($query);
	$row = mysqli_fetch_array($query) or die(mysql_error());
		if(!empty($row["username"]) AND !empty($row["password"])) {
			$_SESSION['username'] = $row['password'];
			$result=mysqli_query(mysqli_connect($servername,$username,$password,$db),"SELECT * FROM snippet ");
			/*while ($rrow=mysqli_fetch_array($query)) {
				$temp=$rrow['id'];
			}*/
			$sql="INSERT INTO snippet(code) VALUES('{$_POST["ta"]}')";
			mysqli_query(mysqli_connect($servername,$username,$password,$db),$sql);
		}
			$rowSQL = mysqli_query(mysqli_connect($servername,$username,$password,$db), "SELECT MAX( id ) AS max FROM snippet" );
			$row = mysqli_fetch_array($rowSQL);
			$x = $row['max'];
			$hash= (rand(0,1000));
			echo "Your id is :".$x;
			echo "The referral code is  2k" . $x."nan".$hash."<br>";
			echo "CODE  ADDED SUCCESSFULLY";
			    //header("Location: displaycode.php?id=$x/2k$hash") ;

	}	
?>
