<?php
 include_once 'connection/connect2.php';

        $searchEscaped = mysqli_real_escape_string($conn, $_GET['ukey']);
        $res=mysqli_query($conn, "SELECT * FROM apertable WHERE ukey='$searchEscaped'");
        $userRow=mysqli_fetch_array($res);
        ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome -<?php echo $userRow['username']; ?></title>
<link type="text/css" rel="stylesheet" href="items/css/main.css">
<link type="text/css" rel="stylesheet" href="items/css/features.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lato:300" rel="stylesheet">
<script type="text/javascript" src="items/js/jquery.js"></script>
<link rel="stylesheet" href="dist/css/lightbox.min.css">
<meta name="viewport" content="width=device-width , initial-scale:1">
</head>
	<body>
		<!--//////////////NAV SECTION /////////////-->
		<div class="row" id="nav">
			<div class="large-nest">
	      <nav>
					<span class="top-nav">
	        <a href="index.php"><img id="menu-logo" src="items/images/logo.png" alt=""/></a>
					</span>
					<i class="fa fa-camera" aria-hidden="true"></i>
	        <ul>
	          <li><a href="home.php" data="home"><i class="fa fa-home" aria-hidden="true"></i><p class="sub-links">Home</p></a></li>
	          <li><a href='profile.php?ukey=<?php echo $userRow['ukey'];?>'><i class="fa fa-user" aria-hidden="true"></i>
						<p class="sub-links">Profile</p></a></li>
						<li><a href="explore.php"><i class="fa fa-users" aria-hidden="true"></i><p class="sub-links">Explore</p></a></li>
						<li id="edit-trigger"><i class="fa fa-pencil" aria-hidden="true"></i><P class="sub-links">Edit</p></li>
						<li><a href="logout.php?logout"><i class="fa fa-sign-out" aria-hidden="true"></i><p class="sub-links">Logout</p></a></li>
	        </ul>
	      </nav>
	    </div>
		</div>
		<script>
		$(function(){
			$('i.fa-bars').click(function(){
				$('#nav ul').slideToggle();
			});
		});
		</script>

<!--~~~~~~~~~~~~~~~~~ SECTION FOR PROFILE EDITS ~~~~~~~~~~~~~~~~~~~-->

<!--~~~~~~~~~~~~~~~~~ END SECTION FOR PROFILE EDITS ~~~~~~~~~~~~~~~-->



<div class="row" id="user-head">
	<div class="user-head-tint">
		<div class="nest">
			 <div class="user-box">
				 <div class="user-info">
					 <!-- add php for user profile picture here -->
					 <?php
 					if($userRow['profileimage']== NULL){
 						?> <img class="user-profile2" src="pictures/defaultprofile.png" alt=""/><?php
 					}
 					else{
 						?> <img class="user-profile2" src="pictures/<?php echo $userRow['profileimage'];?>" alt=""/><?php
 					}

 					?>
					 <!-- add php for username here -->
					 <p class="username-title">
						 <?php echo $userRow['username'];?>
					 </p>
					 <!-- add php for bio here -->
					 <p class="username-bio2">
						 <?php
						 if($userRow['bio']==NULL){
							 echo "No bio yet, BUST!";
						 }
							else{
						 echo $userRow['bio'];
					 };?></p>


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
				         $searchEscaped = mysqli_real_escape_string($conn, $_GET['ukey']);
				         $res=mysqli_query($conn, "SELECT * FROM apertable WHERE ukey='$searchEscaped'");
				         $userRowe=mysqli_fetch_array($res);

								 $sql ="SELECT * FROM aperimages WHERE ukey='".$userRow['ukey']."' ORDER BY id DESC";
			 					$res = mysqli_query($conn,$sql);
			 					if(mysqli_num_rows($res) > 0){
			 					 while($row = mysqli_fetch_assoc($res)){
			 					?>
			 					<div class="image-box">
			 					 <a class="example-image-link" href="pictures/<?php echo $row['image'];?>" data-lightbox="example-set"><img src="pictures/<?php echo $row['image'];?>"  alt='Picture'></a>
			 					</div>
			 					<?php
			 					 }
			 					}
			 				  else{?>
			 					<p id="waiting">This user hasn't uploaded any images yet. BUMMER!</p><?php
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
