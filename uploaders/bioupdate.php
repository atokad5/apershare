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
require_once('../connection/connect2.php');
$bio = $_POST['bio'];

$sql = "UPDATE apertable SET bio= '". addslashes($bio)."' WHERE user_id=".$_SESSION['user'];

if (mysqli_query($conn, $sql)) {
    echo "loading new changes....";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
