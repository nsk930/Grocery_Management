<?php
session_start();
$errors = array();
$email = "";
require_once "includes/connect.php";
if (isset($_SESSION['email'])) {
  	$_SESSION['msg'] = "Already logged in";
  	header('location: index');
  }
  else{}
if (isset($_POST['login_user'])) {
  $email = $conn->real_escape_string($_POST['email']);
  $password = $conn->real_escape_string($_POST['password']);;

  if (empty($email)) {
  	array_push($errors, "Email is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
      $password = md5($password);
      $sql = "SELECT * FROM storemanager WHERE email='$email' AND pass='$password'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['email'] = $email;
    $_SESSION['verified'] = $row['verified'];
    $_SESSION['name'] = $row['user'];
    $_SESSION['uid'] = $row['uid'];
      $_SESSION['message'] = "You are now logged in";
      header('location: index');
}else {
    array_push($errors, "Wrong email/password combination");
}

  	
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
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../vendor/bootstrap-social/bootstrap-social.css">
    <link href="../css/shop-homepage.css" rel="stylesheet">
    <link href="css/menu.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">

    <title>Login</title>
</head>
<body>
   <?php include_once "includes/navbar.php";?>
          <div id="load_screen" class="text-center">
                <div id="loading" class="text-center">
                 <h3>Please wait....</h3>
                 <p> <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                        <span class="sr-only">Loading...</span>
                      </div>
                </div>
          </div>
          <div class="container">
                <div class="row">
                  <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card card-signin my-5">
                      <div class="card-body">
                        <h5 class="card-title text-center">Sign In</h5>
                        <form class="form-signin" method="post" action="login.php">
                        <?php include('errors.php'); ?>
                        <div class="form-label-group">
                            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
                            <label for="inputEmail">Email address</label>
                          </div>
            
                          <div class="form-label-group">
                            <input type="password" class="form-control" placeholder="Password" name="password" id="myInput" required>
                            <label for="myInput">Password</label>
                          </div>
                          <div class="custom-control custom-checkbox mb-3 ml-1">
                                <input type="checkbox" class="custom-control-input" id="check" onclick="myFunction()">
                                <label class="custom-control-label" for="check">Show Password</label>
                          </div>
            
                          
                          <button class="btn btn-lg btn-dark btn-block text-uppercase" type="submit" name="login_user" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Please wait.... ">Sign in</button>
                          <p class="d-block text-center mt-2 small" >Don't have an account? <a href="signup">Register</a></p>
                         <!-- <hr class="my-4">
                          <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fa fa-google mr-2"></i> Sign in with Google</button>
                          <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fa fa-facebook-f mr-2"></i> Sign in with Facebook</button>
                        --></form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
 <!-- jQuery first, then Popper.js, then Bootstrap JS. -->
 <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script id="rendered-js" src="js/menu.js"></script>
<script src="js/preloader.js"></script>  
<script src="js/preloader.js"></script>
<script src="js/showpass.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script>
$('.btn').on('click', function() {
    var $this = $(this);
  $this.button('loading');
    setTimeout(function() {
       $this.button('reset');
   }, 6000);
});

</script>

</body>
</html>