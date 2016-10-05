<?php
header('refresh:000000; url=../home.php');
session_start();
include_once '../connection/dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: home.php");
}
$res=mysql_query("SELECT * FROM apertable WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
?>

<?php
include_once '../connection/connect2.php';


	if($_FILES['profileimage']['size'] < 6279174){
		$ext = pathinfo($_FILES['profileimage']['name'])['extension'];
		$nFn = generateRandomString(). ".$ext";
		move_uploaded_file($_FILES['profileimage']['tmp_name'],"../pictures/".$nFn);
		$sql = "UPDATE apertable SET profileimage='{$nFn}' WHERE user_id=".$_SESSION['user'];
	}
	if($_FILES['profileimage']['size'] > 6279174){
    	$uploadOk = 0;
    	$profileimage = "";
    	$sql ="INSERT INTO users (profileimage) VALUES ($profileimage)";
	}
	function generateRandomString($length = 11){
		return substr(str_shuffle("ijwadoijdaoijdoiajwda"),0,$length);
	}

	if(mysqli_query($conn, $sql)){
		echo "data saved";
	}
	else{
		echo "failed to save".mysqli_error($conn);
	}
	mysqli_close($conn);


?>
