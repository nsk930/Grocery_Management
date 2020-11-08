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

  <title>Shop Homepage</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/mdb.min.css">
  <link href="fontawesome/css/all.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css" integrity="sha256-rFMLRbqAytD9ic/37Rnzr2Ycy/RlpxE5QH52h7VoIZo=" crossorigin="anonymous" />

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">
  <link href="css/menu.css" rel="stylesheet">

</head>

<body>

  <?php include_once"includes/navbar.php";?>
  <!-- Page Content -->
  <div class="container-fluid mt-4 mt-sm-0">
      <header class="jumbotron mb-0">
        <div class="container-fluid">
              <div class="row row-header">
                  <div class="col-12 col-sm-4 align-self-center">
                    <h2 class=""><span class="">Today's Offer</span> <br> <span class="badge badge-danger">New and Special</span></h2>
                    <hr class="d-block d-sm-none">
                </div>
                <div class="col">
                <div class="row">
                      <div class="col-4 col-sm-2 p-2 align-self-center">
                              <img src="assets/image/biscuit.png" class="rounded-circle img-fluid" alt="...">
                              
                      </div>
                    
                      <div class="col-4 col-sm-2 p-2 align-self-center">
                              <img src="assets/image/product/apple.png" class="rounded-circle img-fluid" alt="...">
                              
                      </div>
                      
                      <div class="col-4 col-sm-2 p-2 align-self-center">
                              <img src="assets/image/product/oil.png" class="rounded-circle img-fluid" alt="...">
                              
                      </div>
                      <div class="col-4 col-sm-2 p-2 align-self-center">
                          <img src="assets/image/product/rice.png" class="rounded-circle img-fluid" alt="...">
                          
                      </div>
                      <div class="col-4 col-sm-2 p-2 align-self-center">
                        <img src="assets/image/product/orange.png" class="rounded-circle img-fluid" alt="...">
                        
                    </div>
                    <div class="col-4 col-sm-2 p-2 align-self-center">
                      <img src="assets/image/product/dal.png" class="rounded-circle img-fluid" alt="...">
                      
                  </div>
                     
                    </div>
                  </div> 
                <!--  <div class="col align-self-center ml-sm-4"><h4><span class="badge badge-Spill badge-warning offset-1 offset-sm-1">Don't Miss Them !!!!!!!!</span><br>
                    <button role="button" class="btn btn-block mt-2" id="grab"> <strong>GRAB NOW</strong></button></h4></div>
               </div>-->
               
              </div>
              
</header>

<div class="row d-none mt-2 d-sm-block d-sm-flex justify-content-center">
    <a href="scat?sid=5" type="button" class="btn btn-outline-primary waves-effect">Vegetables & Fruits</a>
    <a href="scat?sid=9" type="button" class="btn btn-outline-default waves-effect">Biscuits, Snacks & Chocolates</a>
    <a href="scat?sid=7" type="button" class="btn btn-outline-secondary waves-effect">Household Items</a>
    <a href="scat?sid=12" type="button" class="btn btn-outline-success waves-effect">Noodles, Sauces and Instant Food</a>
    <a href="scat?sid=10" type="button" class="btn btn-outline-info waves-effect">Beverages</a>

</div>

    <div class="row">
       <div class="col-12">
        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="assets/image/sample1.png" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="assets/image/sample2.png" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="assets/image/sample3.png" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
  </div>
</div>
<hr style="background-color:magenta">
<h2 class="align-self-center text-center">Offer Zone</h2>
        <hr style="background-color:magenta">
        <div class="row">
          <div class="col-6 col-lg-3 col-md-3 mb-4">
           <img src="assets/image/bevarage.png" class="img-fluid">
          </div>
          <div class="col-6 col-lg-3 col-md-3 mb-4">
              <img src="assets/image/veg.png" class="img-fluid">
          </div>
          <div class="col-6 col-lg-3 col-md-3 mb-4">
              <a href="offers"><img src="assets/image/fruit.png" class="img-fluid"></a>
          </div>
          <div class="col-6 col-lg-3 col-md-3 mb-4">
              <img src="assets/image/general.png" class="img-fluid">
          </div>
        </div>
        <hr style="background-color:slateblue">
    <?php
    $sql = "SELECT * FROM supercatagory";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
    ?>
       <a href="scat?sid=<?php echo $row['id'];?>">
        <div class="media bg-white p-3 mb-2">
          <div class="row">
            <div class="col-2">
                <img class="align-self-center mr-3 img-fluid" src="assets/image/<?php echo $row['image'];?>" alt="Generic placeholder image">
            </div>
         
                  <div class="media-body col-8">
                <h5 class="mt-0"><?php echo $row['name'];?></h5>
                <p class="small"><?php echo $row['description'];?>.</p>
              </div>
          </div>
        </div>
        </a>
        <?php 
    }
}
 ?>
        
        
        

      </div>



  <?php include_once"includes/footer.php"; ?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="js/mdb.min.js"> </script>
  <script id="rendered-js" src="js/menu.js"></script>
  <!-- To prevent form resubmission -->
  <script>
  if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</body>

</html>
