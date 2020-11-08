<?php 
include_once"includes/connect.php";
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $sid = test_input($_GET["sid"]);
  $sid = $conn -> real_escape_string($sid);
  $sql = "SELECT * FROM supercatagory where id=$sid";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
$product = $row['name'];
}else{
  header("Location:index");
}
  ?>
  <!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Grocery Mart | Offer Zone</title>

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
      
        <div class="container-fluid">
      <div class="row mt-1">
          <div class="col-sm-2 d-none d-sm-block bg-white" id="side-bar">
              <h5 class="mt-3">Quick links</h5> 
              <hr style="background-color:mediumslateblue">
            
          </div>
          <div class="col-12 col-sm-10 border border-primary bg-white" id="items">
              <p class="mt-2 font-weight-light"><small> Home > <?php echo $product;?> </small></p>
               <div class="row">
                <div class="col-sm-9 col-6"> 
                    <h5>Fruits(100)</h5>
                </div> 
                <div class="ml-auto col w-25 mr-sm-3 mr-0">
                    <select class="custom-select">
                        <option value="1">Popularity</option>
                        <option value="2">Price - Low to High</option>
                        <option value="3">Price - How to Low</option>
                        <option value="3">A-Z</option>

                    </select>
                </div>
               </div>
               <hr>
               <div class="row">
                    <div class="col-6 col-md-3 mb-2">
                            <div class="card">
                              <a href="item-list"><img class="card-img-top img-fluid p-2" src="assets/image/product/banana.png" alt=""></a>
                              <div class="card-body">
                                <h5 class="card-title">
                                  <p class="text-center">Banana</p>
                                </h5>
                                <p class="text-center small">Market Price: $6</p>
                              </div>
                                <table class="table table-striped ml-0">
                                  <tr>   
                                  <td class="small">Raju Fruits</td>
                                  <td class="small">50%</td> 
                                  </tr>
                                  <tr>
                                  <td class="small">Sambhu Fruit Store</td>
                                  <td class="small">40%</td>
                                  </tr>
                                </table>
                              
                             
                            </div>
                     </div>
                     <div class="col-6 col-md-3 mb-2">
                        <div class="card">
                          <a href="item-list"><img class="card-img-top img-fluid p-2" src="assets/image/product/banana.png" alt=""></a>
                          <div class="card-body">
                            <h5 class="card-title">
                              <p class="text-center">Banana</p>
                            </h5>
                            <p class="text-center small">Market Price: $6</p>
                          </div>
                         <table class="table table-striped">
                           <tr>   
                           <td class="small">Raju Fruits</td>
                          <td class="small">50%</td> 
                           </tr>
                           <tr>
                          <td class="small">Sambhu Fruit Store</td>
                          <td class="small">40%</td>
                          </tr>
                        </table>
                      
                         
                         
                        </div>
                 </div>
                
          
    
               </div>
               <hr>
           </div>
      </div>
  </div>
</div>


  <!-- Footer -->
  <?php include_once "includes/footer.php";?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="js/mdb.min.js"> </script>
  <script id="rendered-js" src="js/menu.js"></script>
</body>

</html>
