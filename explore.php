<?php require('navbar.php');?>
<style>
body{
  background-color: #fff;
}
.nest2{
  padding-top:40px;
  margin:auto;
  width:95%;
  max-width:1100px;
}
.user-name-profile{
  color:#173d7a;
}
</style>
<div class="nest2">
<?php
include_once 'connection/connect2.php';
$sql ="SELECT * FROM apertable";
$res = mysqli_query($conn,$sql);
if(mysqli_num_rows($res) > 0){
while($row = mysqli_fetch_assoc($res)){
?>
<a href='profile.php?ukey=<?php echo $row['ukey'];?>'>
<div class="image-box2">
  <?php
  if($row['profileimage'] == NULL){
    ?><img src="pictures/defaultprofile.png"  alt='Picture'><?php
  }
  else{?>
  <img src="pictures/<?php echo $row['profileimage'];?>"  alt='Picture'>
<?php }?>
  <p class="user-name-profile"><?php echo $row['username'];?></p>
</div>
</a>
<?php
}
}
else{?>
<p id="waiting">What are you waiting for? Upload your first image!</p><?php
}
mysqli_close($conn);
?>
<hr></hr>
</div>
