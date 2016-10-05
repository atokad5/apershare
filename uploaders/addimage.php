<?php
header('refresh:000000; url=../home.php');
include_once '../connection/connect2.php';

$conn = new mysqli($servername,$username,$password,$dbname);


	if($_FILES['image']['size'] < 6279174){
		$ukey = $_POST['ukey'];
		$utoken = $_POST['utoken'];
		$s = generateRandomString(). "$utoken";
		$ext = pathinfo($_FILES['image']['name'])['extension'];
		$nFn = generateRandomString(). ".$ext";
		move_uploaded_file($_FILES['image']['tmp_name'],"../pictures/".$nFn);
		$sql = "INSERT INTO aperimages (ukey, utoken, image) VALUES ('".addslashes($ukey)."','{$s}', '{$nFn}')";

	}
	if($_FILES['image']['size'] > 6279174){
    	$uploadOk = 0;
    	$image = "";
    	$ukey ="";
    	$utoken ="";
    	$sql ="INSERT INTO aperimages (ukey, utoken, image) VALUES ($ukey, $utoken, $image)";
	}
	function generateRandomString($length = 11){
		return substr(str_shuffle("ijwadoijdaoijdoiajwda"),0,$length);
	}

	if(mysqli_query($conn,$sql)){
		echo "saving new image...";
	}
	else{
		echo "failed to save. Keep it under 6mb";
	}


mysqli_close($conn);
?>
