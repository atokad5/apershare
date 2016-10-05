<?php
header('refresh:000000; url=../home.php');
session_start();
include_once '../connection/connect2.php';

if(!isset($_SESSION['user']))
{
	header("Location: home.php");
}
$res=mysql_query("SELECT * FROM apertable WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
?>

<?php
header('refresh:000000; url=../home.php');
include_once '../connection/connect2.php';
	if($_FILES['bgheader']['size'] < 6279174){
		$ext = pathinfo($_FILES['profileimage']['name'])['extension'];
		$nFn = generateRandomString(). ".$ext";
		move_uploaded_file($_FILES['bgheader']['tmp_name'],"../pictures/".$nFn);
		$sql = "UPDATE apertable SET bgheader='{$nFn}' WHERE user_id=".$_SESSION['user'];
	}
	if($_FILES['bgheader']['size'] > 6279174){
    	$uploadOk = 0;
    	$profileimage = "";
    	$sql ="INSERT INTO apertable (bgheader) VALUES ($bgheader)";
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
