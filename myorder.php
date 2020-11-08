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

  <title>Your Orders</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="fontawesome/css/all.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css" integrity="sha256-rFMLRbqAytD9ic/37Rnzr2Ycy/RlpxE5QH52h7VoIZo=" crossorigin="anonymous" />
 <link rel="stylesheet" href="css/mdb.min.css">
  <!-- Custom styles for this template -->
  <link href="css/shop-item.css" rel="stylesheet">
  <link href="css/shop-homepage.css" rel="stylesheet">
  <link href="css/cart.css" rel="stylesheet">
  <link href="css/menu.css" rel="stylesheet">
</head>

<body>

<?php include_once "includes/navbar.php";?>

          <div class="container my-5 my-sm-0 mb-sm-4">
          <div id="shopping-cart">
                <div class="card shopping-cart">
                         <div class="card-header bg-dark text-light">
                             <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            Your Orders
                         <div class="clearfix"></div>
                         </div>
						 
                         <div class="card-body">
                              <!-- PRODUCT -->
<?php $sql1 = "SELECT * FROM orders where userid='$uid' and deliver=0";
        $result = $conn->query($sql1);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()){
              $itemid = $row['itemid'];
              $quantity = $row['quantity'];
              $trans_id = $row['trans_id'];
              $sql2 = "SELECT * FROM items where id='$itemid'";
              $result2 = $conn->query($sql2);
              $row2 = $result2->fetch_assoc();
              $prodid = $row2['prodid'];
              $storeid = $row2['storeid'];
              $rate = $row2['rate'];
              $price = $rate * $quantity;

              $sql3 = "SELECT * FROM product where id='$prodid'";
              $result3 = $conn->query($sql3);
              $row3 = $result3->fetch_assoc();
              $image = $row3['image'];
              $name = $row3['name'];

              $sql4 = "SELECT * FROM store where id='$storeid'";
              $result4 = $conn->query($sql4);
              $row4 = $result4->fetch_assoc();
              $storename = $row4['name'];

            

           ?>
                                 <div class="row">
                                     <div class="col-6 col-sm-2 text-center">
                                             <img class="img-responsive" src="assets/image/product/<?php echo $image; ?>" alt="preview" width="120" height="80">
                                     </div>
                                     <div class="col-6 text-sm-left col-sm-6 mb-2 mb-sm-0">
                                         <h4 class="product-name"><strong><?php echo $name; ?></strong></h4>
                                         <small><?php echo $storename; ?></small>
                                         <h6>
                                             
                                         </h6>
                                     </div>
                                     <div class="col mt-2">
                                        <h4> x <?php echo $quantity;?> = <?php echo $price;?></h4>
                                      </div>
                                   
                                   
                                 </div>
                                 <hr>
          <?php }
        }?>
                                 <!-- END PRODUCT -->
                               
                            
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
