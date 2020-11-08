<?php
session_start();  
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

  <title>Shop Item</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="fontawesome/css/all.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css" integrity="sha256-rFMLRbqAytD9ic/37Rnzr2Ycy/RlpxE5QH52h7VoIZo=" crossorigin="anonymous" />
 <link rel="stylesheet" href="css/mdb.min.css">
  <!-- Custom styles for this template -->
  <link href="css/shop-item.css" rel="stylesheet">
  <link href="css/shop-homepage.css" rel="stylesheet">
  <link href="css/menu.css" rel="stylesheet">

</head>

<body>

<?php include_once "includes/navbar.php";?>
  <!-- Page Content -->
  <div class="container">
<div class="container">
        <div class="row">
            <ol class="col-12 breadcrumb">
                <li class="breadcrumb-item"><a href="./index.html">Home</a></li>
                <li class="breadcrumb-item active">Contact Us</li>
            </ol>
            <div class="col-12">
               <h3>Contact Us</h3>
               <hr>
            </div>
        </div>

        <div class="row row-content">
           <div class="col-12">
              <h3>Location Information</h3>
           </div>
            <div class="col-12 col-sm-4 offset-sm-1">
                   <h5>Our Address</h5>
                    <address style="font-size: 100%">
		              121, Clear Water Bay Road<br>
		              Clear Water Bay, Kowloon<br>
		              HONG KONG<br>
		              <i class="fa fa-phone"></i>: +852 1234 5678<br>
		              <i class="fa fa-fax"></i>: +852 8765 4321<br>
		              <i class="fa fa-envelope"></i>:
                        <a href="mailto:confusion@food.net">confusion@food.net</a>
		           </address>
            </div>
            <div class="col-12 col-sm-6 offset-sm-1">
                <h5>Map of our Location</h5>
            </div>
            <div class="col-12 col-sm-11 offset-sm-1">
                <div class="btn-group" role="group">
                    <a role="button" class="btn btn-primary" href="tel:+919876543210"><i class="fa fa-phone"></i> Call</a>
                    <a role="button" class="btn btn-info"><i class="fab fa-skype"></i> Skype</a>
                    <a role="button" class="btn btn-success" href="mailto:confusion@gmail.com"><i class="fas fa-envelope"></i> Email</a>
                </div>
        </div>
        </div>
        <hr>
        <div class="row row-content">
           <div class="col-12">
              <h3>Send us your Feedback</h3>
           </div>
            <div class="col-12 col-md-9">
                <form>
                    <div class="form-group row">
                        <label for="firstname" class="col-md-2 col-form-lebel">First Name</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name">

                        </div>
                    </div>
                    <div class="form-group row">
                            <label for="lastname" class="col-md-2 col-form-lebel">Last Name</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name">
    
                            </div>
                    </div>
                        
                    <div class="form-group row">
                            <label for="telnum" class="col-12 col-md-2 col-form-lebel">Contact Tel.</label>
                            <div class="col-5 col-md-3">
                                <input type="tel" class="form-control" id="areacode" name="areacode" placeholder="Area Code">
                            </div>
                            <div class="col-7 col-md-7">
                                    <input type="tel" class="form-control" id="telnum" name="telnum" placeholder="Tel. Number">
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="email" class="col-md-2 col-form-lebel">Email</label>
                                <div class="col-md-10">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        
                                </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-2">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="approve" id="approve" value="">
                                    <label class="form-check-lebel" for="approve">
                                        <strong>May we contact you?</strong>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3 offset-md-1">
                                <select class="form-control">
                                    <option>Tel.</option>
                                    <option>Email</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="feedback" class="col-md-2 col-form-lebel">Feedback</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" id="feedback" name="feedback" rows="12"></textarea>
        
                                </div> 
                            </div>
                         <div class="form-group row">
                             <div class="offset-md-2 col-md-10">
                                 <button type="submit" class="btn btn-primary">
                                     Send Feedback
                                 </button>
                             </div>
                         </div>

                </form>
            </div>
             <div class="col-12 col-md">
            </div>
       </div>

    </div>

  <!-- /.container -->
</div>
<?php include_once "includes/footer.php";?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="js/mdb.min.js"> </script>
  <script id="rendered-js" src="js/menu.js"></script>
</body>

</html>
