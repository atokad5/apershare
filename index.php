<?php
session_start();
include_once 'connection/dbconnect.php';
if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
}

if(isset($_POST['btn-login']))
{
	$email = mysql_real_escape_string($_POST['email']);
	$upass = mysql_real_escape_string($_POST['pass']);
	$res=mysql_query("SELECT * FROM apertable WHERE email='$email'");
	$row=mysql_fetch_array($res);

	if($row['password']==($upass))
	{
		$_SESSION['user'] = $row['user_id'];
		header("Location: home.php");
	}
	else
	{
		?>
        <script>alert('wrong details, check your login!');</script>
      <?php
	}
}
?>
<?php
if(isset($_SESSION['user'])!="")
{
	header("Location: home.php");
}
include_once 'connection/dbconnect.php';

if(isset($_POST['btn-signup']))
{
$ukey = $_POST['ukey'];

	$nFn = generateRandomString(). "$ukey";
	$uname = mysql_real_escape_string($_POST['uname']);
	$email = mysql_real_escape_string($_POST['email']);
	$upass = mysql_real_escape_string($_POST['pass']);

	if(mysql_query("INSERT INTO apertable(ukey,username,email,password) VALUES('{$nFn}','$uname','$email','$upass')"))
	{
		?>
        <script>alert('successfully registered ');</script>
        <?php
	}
	else
	{
		?>
        <script>alert('error while registering you...');</script>
        <?php
	}
}
function generateRandomString($legnth = 20){
	return substr(str_shuffle("abcdefgh978ijk76575lmn645op5236qrstuv523423wxyz2"),0 , $legnth);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Apershare Your Web Sharing Platform</title>
  <link type="text/css" rel="stylesheet" href="items/css/style.css">
  <link type="text/css" ref="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300" rel="stylesheet">
  <script type="text/javascript" src="items/js/jquery.js"></script>
  <meta name="viewport" content="width=device-width , initial-scale:1">
</head>
<body>
  <div class="row" id="header">
  <div class="row" id="nav-section">
    <div class="large-nest">
      <nav>
        <img id="menu-logo" src="items/images/logo.png" alt=""/>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="#start">Get Started</a></li>
        </ul>
      </nav>
    </div>
  </div>
  <header>
  <div class="nest" id="header-content">
    <div class="form-section">
  <!--//////// SIGN IN FORM ////////-->
      <div class="form-box" id="sign-in-box">
        <h1>Photosharing Done Right.</h1>
        <p class="create">Create a free profile and share or store your awesome pictures with your friends!</p>
          <form method="post" id="formIDe">
            <input type="text" name="email" placeholder="Your Email" required />
            <input type="password" name="pass" placeholder="Your Password" required />
            <button type="submit" name="btn-login">Sign In &#8594;</button>
          </form>
          <p class="account">
            Don't have an account?
          </p>
            <p class="sign-up" id="create-account">Sign Up Here</p>
            <p id="active">Active Users:</p>
            <img class="faces" src="items/images/7.jpg" alt=""/>
            <img class="faces" src="items/images/0.jpg" alt=""/>
            <img class="faces" src="items/images/27.jpg" alt=""/>
            <img class="faces" src="items/images/32.jpg" alt=""/>
            <img class="faces" src="items/images/29.jpg" alt=""/>
      </div>
<!--//////// SIGN UP FORM ////////-->
      <div class="form-box" id="sign-up-box">
        <h1>Photosharing Done Right.</h1>
        <p class="create">Ready to start building your portfolio? We are excited that you are signing up!</p>
          <form method="post" id="formID" />
            <input type="hidden" name="ukey">
            <input type="text" name="uname" placeholder="User Name" required />
            <input type="email" name="email" placeholder="Your Email" required />
            <input type="password" name="pass" placeholder="Your Password" required />
            <button type="submit" name="btn-signup">Sign Me Up</button>
          </form>
          <p class="account">
            Don't have an account?
          </p>
            <p class="sign-up" id="go-sign-in">Return to Login</p>
      </div>
    </div>

  </div>
</div><!-- close the header image -->
  </header>
	<script>
	var form = document.getElementById('formID'); // form has to have ID: <form id="formID">
	form.noValidate = true;
	form.addEventListener('submit', function(event) { // listen for form submitting
	        if (!event.target.checkValidity()) {
	            event.preventDefault(); // dismiss the default functionality
	            alert('You forgot something!'); // error message
	        }
	    }, false);
	</script>
	<script>
	var form = document.getElementById('formIDe'); // form has to have ID: <form id="formID">
	form.noValidate = true;
	form.addEventListener('submit', function(event) { // listen for form submitting
					if (!event.target.checkValidity()) {
							event.preventDefault(); // dismiss the default functionality
							alert('You have entered the wrong email or password'); // error message
					}
			}, false);
	</script>
 <!-- end of the top header section -->

  <div class="row skew">
    </div>
    <div class="row skew mirror">
    </div>
    <div class="row skew flat">
      <div class="nest">
				<div id="start"></div>
      <div class="flex-box-main-page">
        <div class="box">
          <img src="items/images/signup.png" alt=""/>
          <p class="box-title">Sign Up</p>
          <hr></hr>
          <p class="box-content">
            Create your photosharing account with a few clicks of a button! Share high-resolution images with your friends and others who appreciate your work!
          </p>
        </div>

        <div class="box">
          <img src="items/images/photography.png" alt=""/>
          <p class="box-title">Upload Your Work</p>
          <hr></hr>
          <p class="box-content">
          Upload your images on your computer, tablet, or smartphone. Not only can you use Apershare to share your great images, but you can also use it to simply store your pictures!
          </p>
        </div>

        <div class="box">
          <img src="items/images/share.png" alt=""/>
          <p class="box-title">Share Your Work </p>
          <hr></hr>
          <p class="box-content">
            Share your photos with friends and or just other Apershare users who are interested in viewing your great work. This is a great opportunity for you to gain a following for your excellent photography skills.
          </p>
        </div>

      </div>
    </div>
    <div class="footer">
    <footer>
      <p>&copy; Apershare 2016</p>
    </footer>
    </div>
  </div>

<script type="text/javascript" src="items/js/main.js"></script>
</body>
</html>
