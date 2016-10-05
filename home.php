<?php require('navbar.php');?>
<!--~~~~~~~~~~~~~~~~~ SECTION FOR PROFILE EDITS ~~~~~~~~~~~~~~~~~~~-->
<div class="overlay">
	<div class="edits">
	<i class="fa fa-times" aria-hidden="true"></i>
		<div class="edit-nest">
			<p id='change-title'>Hey <?php echo $userRow['username'];?>, make some quick page edits!</p>
			<?php
		 if($userRow['profileimage']== NULL){
			 ?> <img class="user-profile" src="pictures/defaultprofile.png" alt=""/><?php
		 }
		 else{
			 ?> <img class="user-profile" src="pictures/<?php echo $userRow['profileimage'];?>" alt=""/><?php
		 }
		 ?>
				<!-- PROFILE IMAGE UPDATE -->
				<form id="pro-image-change" action="uploaders/profileimage.php" method="post" enctype="multipart/form-data" id="formIDp">
		    	<input type="file" name="profileimage" required="true" />
		    	<button>Submit</button>
				</form>
				<!-- END PROFILE IMAGE UPDATE -->

 			<!-- BIO INFO UPDATE -->
			<form id="bio-image-change" action="uploaders/bioupdate.php" method="post">
		    <textarea name="bio" placeholder="About Me" maxlength="150"><?php echo $userRow['bio'];?></textarea>
		    <button id="bio-update">Update</button>
	    </form>
			<div class="bg-header-form">
			<?php
		 if($userRow['bgheader']== NULL){
			 ?> <img class="bg-header-mini" src="../items/images/header.jpg" alt=""/><?php
		 }
		 else{
			 ?> <img class="bg-header-mini" src="pictures/<?php echo $userRow['bgheader'];?>" alt=""/><?php
		 }
		 ?>
			<form action="uploaders/bgheader.php" method="post" enctype="multipart/form-data">
        <input type="file" name="bgheader"/>
        <button>Update</button>
        </form>
			</div>
			<div class="changer-nest">
			<p class="changer" id="change-bio-tab">Change Bio</p>
			<p class="changer" id="change-header-tab">Change Header</p>
		</div>
			<!-- END BIO INFO UPDATE -->
		</div>
	</div>
</div>
<!--~~~~~~~~~~~~~~~~~ END SECTION FOR PROFILE EDITS ~~~~~~~~~~~~~~~-->



<div class="row" id="user-head">
	<div class="user-head-tint">
		<div class="nest">
			 <div class="user-box">
				 <div class="user-info">
					 <!-- add php for user profile picture here -->
					 <?php
 					if($userRow['profileimage']== NULL){
 						?> <img class="user-profile" src="pictures/defaultprofile.png" alt=""/><?php
 					}
 					else{
 						?> <img class="user-profile" src="pictures/<?php echo $userRow['profileimage'];?>" alt=""/><?php
 					}

 					?>
					 <!-- add php for username here -->
					 <p class="username-title">
						 <?php echo $userRow['username'];?>
					 </p>
					 <!-- add php for bio here -->
					 <p class="username-bio">
						 <?php echo $userRow['bio'];?></p>
					 </p>
					 <i class="fa fa-camera" aria-hidden="true"></i>
					 <p class="upload">Upload Image</p>
					 <form id="target" action='uploaders/addimage.php' method='post' enctype="multipart/form-data"  id="formID">
						 <input type='hidden' name='ukey' value='<?php echo $userRow['ukey'];?>'>
						 <input type='hidden' name='utoken' required="true">
						 <input id="file" type='file' name='image' required="true">
						 <button>Send</button>
					 </form>
				 </div>
			 </div>
		</div>
 </div>
</div>

	 <div class="row">
		 <div class="large-nest" id="image-container">
			 <div class="image-nest">
				 <!-- PHP WHILE LOOP FOR IMAGES HERE -->
					 <?php
					include_once 'connection/connect2.php';
				 	$sql ="SELECT * FROM aperimages WHERE ukey='".$userRow['ukey']."' ORDER BY id DESC";
					$res = mysqli_query($conn,$sql);
					if(mysqli_num_rows($res) > 0){
					 while($row = mysqli_fetch_assoc($res)){
					?>
					<div class="image-box">
					 <a class="example-image-link" href="pictures/<?php echo $row['image'];?>" data-lightbox="example-set"><img src="pictures/<?php echo $row['image'];?>"  alt='Picture'></a>
					 <span class="delete"><a href="uploaders/delete.php?utoken=<?php echo $row['utoken'];?>"><i class="fa fa-times" aria-hidden="true"></i></a></span>
					</div>
					<?php
					 }
					}
				  else{?>
					<p id="waiting">What are you waiting for? Upload your first image!</p><?php
					}
			 	mysqli_close($conn);
				?>
				<!--END OF PHP WHILE LOOP FOR IMAGES HERE -->
		 </div>
		</div>
	</div>
	 <div class="row">
	 		<div class="nest footer">
				<img id="footer-logo" src="items/images/logo.png" alt=""/>
			</div>
	 </div>
	 <script>
$(function(){
$("#user-head").css('background-image', 'url("<?php
if($userRow['bgheader']== NULL){
	echo '/items/images/fillin.jpg';
}
    else{
        echo 'pictures'.'/'.$userRow['bgheader'];
    } ?>")');

});
</script>
	 <script type="text/javascript" src="items/js/main.js"></script>
	 <script src="dist/js/lightbox-plus-jquery.min.js"></script>
	</body>
</html>
