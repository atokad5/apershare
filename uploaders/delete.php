<?php
  header('refresh:000000; url=../home.php');
  include_once '../connection/connect2.php';
   $utoken = $_GET['utoken'];
   $sql ="DELETE FROM aperimages WHERE utoken='$utoken'";
    $res = mysqli_query($conn,$sql);

    if(mysqli_query($conn,$sql)){
      echo "deleting..";
    }
    else{
      echo "failed to delete".mysqli_error($conn);
    }
    mysqli_close($conn);
?>
