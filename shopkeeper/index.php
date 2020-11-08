<?php session_start();  
 include_once"includes/connect.php";
if (!isset($_SESSION['email'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login');
}else{
    $email = $_SESSION['email'];
    $user = $_SESSION['name'];
    $uid = $_SESSION['uid'];

}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shopkeeper's Corner</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../fontawesome/css/all.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css" integrity="sha256-rFMLRbqAytD9ic/37Rnzr2Ycy/RlpxE5QH52h7VoIZo=" crossorigin="anonymous" />

  <!-- Custom styles for this template -->
  <link href="../css/shop-homepage.css" rel="stylesheet">
  <link href="css/menu.css" rel="stylesheet">

<!-- CSS -->
<link href='select2/dist/css/select2.min.css' rel='stylesheet' type='text/css'>
</head>

<body>

  <!-- Navigation -->
  <?php include_once"includes/navbar.php";?>
  

<div class="container">
<?php 
	 
	 if (!$_SESSION['verified']): ?>
<div class="container">
    <div class="row">
      <div class="col-sm-9 offset-sm-1">
          <div class="alert alert-warning alert-dismissible fade show mt-5" role="alert">
            You will receive an email to verify your account within 15 minutes (Also check your spam folder in case you didn't receive the email)!
            Sign into your email account and click
            on the verification link at :<strong><?php echo $_SESSION['email']; ?></strong>. And then again <b>Login</b> here to submit your observation.
          </div>
		 </div>
	</div>
</div>	
        <?php else: ?>  
<?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-success">
          <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            unset($_SESSION['type']);
          ?>
          <br> Welcome <b><?php echo $user;?></b>
        </div>
        <?php endif;?>
<?php
$errors = array();

				if(isset($_GET['items']))

				{

				include('sidebar/items.php');	

                }
      	if(isset($_GET['buisness']))

				{

				include('sidebar/buisness.php');	

                }

        
	?>
  <?php endif;?>

   
</div>

<?php //include_once "includes/footer.php"; ?>
  <!-- Bootstrap core JavaScript -->

  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script id="rendered-js" src="js/menu.js"></script>
  <script src='select2/dist/js/select2.min.js' type='text/javascript'></script>
  <script>
        $(document).ready(function(){
            
            // Initialize select2
            $(".selUser").select2();

       
        });
    </script>

</body>

</html>
