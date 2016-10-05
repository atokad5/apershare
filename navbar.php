<?php
session_start();
include_once 'connection/dbconnect.php';

if(!isset($_SESSION['user']))
{
	header("Location: index.php");
}
$res=mysql_query("SELECT * FROM apertable WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome -<?php echo $userRow['username']; ?></title>
<meta property="og:image" content="http://www.apershare.us/apersharemain.jpg" />
<meta name="googlebot" content="noodp">
<meta name="slurp" content="noydir">
<meta name="description" content="We are a free online photosharing application. Not only can you post your beautiful images, but you can also view others or simply just store your photos on your account!">
<meta name="publisher" content="Apershare Photosharing">
<meta name="Revisit-after" content="7 Days">
<meta name="distribution" content="LOCAL">
<meta name="Robots" content="INDEX, FOLLOW">
<meta name="page-topic" content="Apershare Photosharing">
<meta name="YahooSeeker" content="INDEX, FOLLOW">
<meta name="URL" content="http://www.apershare.us">
<meta name="msnbot" content="INDEX, FOLLOW">
<meta name="googlebot" content="index,follow">
<meta name="Rating" content="General">
<meta name="allow-search" content="yes">
<meta name="expires" content="never">
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
