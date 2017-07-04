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

	$query=mysqli_query(mysqli_connect($servername,$username,$password,$db),"SELECT* FROM details where username='{$_POST["user"]}' AND password='{$_POST["pass"]}' ") or die(mysqli_error());
	$sqll=mysqli_query(mysqli_connect($servername,$username,$password,$db),"SELECT id FROM details where username='{$_POST["user"]}' AND password='{$_POST["pass"]}' ");
	if (mysqli_num_rows($sqll) > 0) {
    // output data of each row

			$rrow = mysqli_fetch_assoc($sqll);
        	echo "id: " . $rrow["id"].  " Save this for future viewing <br>";
	}
	else {
    	echo "0 results";
	}
	$row = mysqli_fetch_array($query) or die(mysql_error());
		if(!empty($row["username"]) AND !empty($row["password"])) {
			$_SESSION['username'] = $row['password'];
			$ssql="INSERT INTO details(username,password,code) VALUES('{$_POST["user"]}','{$_POST["pass"]}','{$_POST["ta"]}')";
			mysqli_query(mysqli_connect($servername,$username,$password,$db),$ssql);
			echo "Last used id is " . mysqli_insert_id(mysqli_connect($servername,$username,$password,$db));
			echo "CODE  ADDED SUCCESSFULLY";

		}
	}
?>
