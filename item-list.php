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

  <title>Grocery Mart | Items</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="fontawesome/css/all.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css" integrity="sha256-rFMLRbqAytD9ic/37Rnzr2Ycy/RlpxE5QH52h7VoIZo=" crossorigin="anonymous" />
 <link rel="stylesheet" href="css/mdb.min.css">
 <link href="css/menu.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>

<?php include_once "includes/navbar.php";?>
  <!-- Page Content -->
  <div class="container-fluid mt-5 mt-sm-5 mt-md-5 mt-lg-0">
      <!--<div class="d-none d-sm-block bg-white">
        <hr style="background-color:mediumturquoise">
        <h3 class="align-self-center text-center">Featured Products</h3>
        <hr style="background-color:mediumturquoise">
        <div class="row">

          <div class="col-6 col-sm-2 mb-4">
            <div class="card h-80">
              <a href="shop"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
              <div class="card-body">
                <h5 class="card-title">
                  <a href="#">Item One</a>
                </h5>
                <h6>$24.99</h6>
               </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>
          <div class="col-6 col-sm-2 mb-4">
            <div class="card h-80">
              <a href="shop"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
              <div class="card-body">
                <h5 class="card-title">
                  <a href="#">Item One</a>
                </h5>
                <h6>$24.99</h6>
               </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>
          <div class="col-6 col-sm-2 mb-4">
            <div class="card h-80">
              <a href="shop"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
              <div class="card-body">
                <h5 class="card-title">
                  <a href="#">Item One</a>
                </h5>
                <h6>$24.99</h6>
               </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>
          <div class="col-6 col-sm-2 mb-4">
            <div class="card h-80">
              <a href="shop"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
              <div class="card-body">
                <h5 class="card-title">
                  <a href="#">Item One</a>
                </h5>
                <h6>$24.99</h6>
               </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>
          <div class="col-6 col-sm-2 mb-4">
            <div class="card h-80">
              <a href="shop"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
              <div class="card-body">
                <h5 class="card-title">
                  <a href="#">Item One</a>
                </h5>
                <h6>$24.99</h6>
               </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>
          <div class="col-6 col-sm-2 mb-4">
            <div class="card h-80">
              <a href="shop"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
              <div class="card-body">
                <h5 class="card-title">
                  <a href="#">Item One</a>
                </h5>
                <h6>$24.99</h6>
               </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>
          </div>
        </div>-->
        <div class="container-fluid">
      <div class="row mt">
          <div class="col-sm-2 d-none d-sm-block bg-white mt-4" id="side-bar">
              <h5 class="mt-3">Filters</h5> 
              <hr style="background-color:mediumslateblue">
              <h6>Brand</h6>
              <div class="row ml-2">
                <div class="col-12">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                  <label class="form-check-label" for="inlineCheckbox1">Britania</label>
                </div>
                <div class="col-12">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                    <label class="form-check-label" for="inlineCheckbox2">Bisk Farm</label>
                </div>
                <div class="col-12">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                    <label class="form-check-label" for="inlineCheckbox3">Good Day</label>
                </div>
              </div>
              <hr>
              <h6>Rating</h6>
              <div class="row ml-2">
                <div class="col-12">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="option4">
                  <label class="form-check-label" for="inlineCheckbox4">4 & above</label>
                </div>
                <div class="col-12">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="option5">
                    <label class="form-check-label" for="inlineCheckbox5">3 & above</label>
                </div>
                <div class="col-12">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox6" value="option6">
                    <label class="form-check-label" for="inlineCheckbox6">2 & above</label>
                </div>
              </div>
              <hr>
              <h6>Dsicount</h6>
              <div class="row ml-2">
                <div class="col-12">
                  <input class="form-check-input" type="checkbox" id="inlineCheckbox7" value="option7">
                  <label class="form-check-label" for="inlineCheckbox7">50% or more</label>
                </div>
                <div class="col-12">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox8" value="option8">
                    <label class="form-check-label" for="inlineCheckbox8">40% or more</label>
                </div>
                <div class="col-12">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox9" value="option9">
                    <label class="form-check-label" for="inlineCheckbox9">20% or more</label>
                </div>
              </div>
          </div>
          <div class="col-12 col-sm-10 border border-primary bg-white mt-4" id="items">
              <p class="mt-2 font-weight-light"><small> Home > Product Name</small></p>
               <div class="row">
                <div class="col-sm-9 col-6"> 
                    <h5>Search results (100)</h5>
                </div> 
                <div class="ml-auto col w-25 mr-sm-3 mr-0">
                    <select class="custom-select">
                        <option value="1">Popularity</option>
                        <option value="2">Price - Low to High</option>
                        <option value="3">Price - How to Low</option>
                        <option value="3">Alphabetical</option>

                    </select>
                </div>
               </div>
               <hr>
               <div class="row">
                    <div class="col-12 col-lg-3 col-md-3 mb-4">
                            <div class="card h-100">
                              <a href="shop"><img class="card-img-top img-fluid" src="assets/image/shops/shop1.jpg" alt=""></a>
                              <div class="card-body">
                                <h5 class="card-title">
                                  <a href="shop">Bannerjee Variety Store</a>
                                </h5>
                                <h6>$24.99</h6>
                                <p class="card-text d-none d-sm-block">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                                <p class="card-text d-block d-sm-none">Short description</p>
                              </div>
                              <div class="card-footer">
                                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                              </div>
                            </div>
                     </div>
                     
               </div>
               <hr>
           </div>
      </div>
  </div>
</div>


<?php include_once "includes/footer.php";?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="js/mdb.min.js"> </script>
  <script id="rendered-js" src="js/menu.js"></script>
</body>

</html>
