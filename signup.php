<?php session_start();
$email = "";
// Include config file
//error_reporting(0);
require_once 'controllers/sendEmails.php';
require_once "key/lib/random.php";
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
require_once "includes/connect.php";
      $errors= array();
	  if (isset($_SESSION['email'])) {
  	$_SESSION['msg'] = "Already logged in";
  	header('location:index');
  }
if (isset($_POST['reg_user'])) {
    if (empty($_POST['email'])) { array_push($errors, "Email is required"); }
    if (empty($_POST['password'])) { array_push($errors, "Password is required"); }
    if (empty($_POST['name'])) { array_push($errors, "Name is required"); }
    if (empty($_POST['mobile'])) { array_push($errors, "Phone number is required"); }

	 $name = $conn->real_escape_string($_POST['name']);
	 $mobile = $conn->real_escape_string($_POST['mobile']);
	 $email = $conn->real_escape_string($_POST['email']);
	 $password = $conn->real_escape_string($_POST['password']);
	 $confirm_password = $conn->real_escape_string($_POST['confirm_password']);

	 
  if ($password != $confirm_password) {
	array_push($errors, "The two passwords do not match");
  }
$sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if ($user['email'] === $email) {
        array_push($errors, "email already exists");
      }
}
 
  if (count($errors) == 0) {
  	$password = md5($password);//encrypt the password before saving in the database
    $stmt = $conn->prepare("INSERT INTO users (user,pass,email,mobile,token) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssis", $user, $pass, $email, $mobile,$token);
      
    $user = test_input($name);
    $email = test_input($email);
    $pass = test_input($password);
    $mobile = test_input($mobile);	 
    $token = bin2hex(random_bytes(50));
    $stmt->execute();
// TO DO: send verification email to user
//sendVerificationEmail($email, $token);
$_SESSION['email'] = $email;
$_SESSION['success'] = "You are now logged in";
$_SESSION['verified'] = false;
echo("<script>location.href = 'index';</script>");	
	}else
	{
		array_push($errors, "Something went wrong");
	}
} 
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="theme-color" content="#212121" />
    <!-- Bootstrap CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="vendor/bootstrap-social/bootstrap-social.css">
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <title>Signup</title>
</head>
<body>
    <?php include_once "includes/navbar.php";?>
          <div id="load_screen" class="text-center">
              <div id="loading" class="text-center">
               <h3>Please wait...</h3>
               <p> <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                      <span class="sr-only">Loading...</span>
                    </div>
              </div>
        </div>
          <div class="container">
                <div class="row">
                  <div class="col-lg-10 col-xl-9 mx-auto">
                    <div class="card card-signin flex-row my-5">
                      <div class="card-img-left d-none d-md-flex">
                         <!-- Background image for card set in CSS! -->
                      </div>
                      <div class="card-body">
                        <h5 class="card-title text-center">Register</h5>
                        <form class="form-signin" method="post" action="signup.php">
                        <?php include('errors.php'); ?>
                            <div class="row">
                                <div class="col-sm-12">
                                <div class="form-label-group">
                                    <input type="text" id="name" class="form-control" placeholder="Your Name" name="name" required autofocus>
                                    <label for="name">Your Name</label>
                                </div>
                                </div>
                       

                            </div>
            
                          <div class="form-label-group">
                            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required>
                            <label for="inputEmail">Email address</label>
                          </div>
                          <div class="form-label-group">
                                <input type="number"  id="mobile" class="form-control" placeholder="Mobile address" name="mobile" required>
                                <label for="mobile">Mobile number</label>
                            </div>
                         
                          <hr>
                        
                          <div class="form-label-group">
                            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
                            <label for="inputPassword">Password</label>
                          </div>
                          
                          <div class="form-label-group">
                            <input type="password" id="inputConfirmPassword" class="form-control" placeholder="Password" name="confirm_password" required>
                            <label for="inputConfirmPassword">Confirm password</label>
                          </div>
                       
                 <button class="btn btn-lg btn-dark btn-block text-uppercase" type="submit" name="reg_user" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Please wait.... ">Register</button>
                          <p class="d-block text-center mt-2 small" >Already have an account? <a href="login.php">Log In</a></p>
                       </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
 <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
 <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script id="rendered-js" src="js/menu.js"></script>
<script src="js/preloader.js"></script>  
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script>
$('.btn-block').on('click', function() {
    var $this = $(this);
  $this.button('loading');
    setTimeout(function() {
       $this.button('reset');
   }, 8000);
});

</script>

</body>
</html>
