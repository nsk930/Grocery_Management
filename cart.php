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
<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	
	case "remove":
		if(!empty($_SESSION["cartitem"])) {
			foreach($_SESSION["cartitem"] as $k => $v) {
					if($_GET["name"] == $_SESSION["cartitem"][$k]["name"] and $_GET["storeid"] == $_SESSION["cartitem"][$k]["storeid"])
						unset($_SESSION["cartitem"][$k]);				
					if(empty($_SESSION["cartitem"]))
						unset($_SESSION["cartitem"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cartitem"]);
	break;	
}
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
                             Shipping cart
                        
                             <a href="javascript:history.go(-1)" class="btn btn-outline-info btn-sm pull-right">Continue shopping</a>
                             <a href="cart.php?action=empty" class="btn btn-outline-danger btn-sm pull-right">Empty Cart</a>
                             <div class="clearfix"></div>
                         </div>
						 
                         <div class="card-body">
                         <?php
if(isset($_SESSION["cartitem"])){
    $total_quantity = 0;
    $total_price = 0;
?>	                                <!-- PRODUCT -->
 <?php		
    foreach ($_SESSION["cartitem"] as $item){
        $item_price = $item["quantity"]*$item["price"];
        ?>
                                 <div class="row">
                                     <div class="col-6 col-sm-2 text-center">
                                             <img class="img-responsive" src="assets/image/product/<?php echo $item["image"]; ?>" alt="preview" width="120" height="80">
                                     </div>
                                     <div class="col-6 text-sm-left col-sm-6 mb-2 mb-sm-0">
                                         <h4 class="product-name"><strong><?php echo $item["name"]; ?></strong></h4>
                                         <small><?php echo $item["storename"]; ?></small>
                                         <h6>
                                             
                                         </h6>
                                     </div>
                                     <div class="col-12 col-sm-4 text-right row">
                                         <div class="col-6 col-sm-6 text-sm-right" style="padding-top: 5px">
                                             <h6><strong>₹<?php echo $item["price"]; ?> <span class="text-muted">x</span> <?php echo $item["quantity"]; ?></strong> = <?php echo "₹". number_format($item_price,2); ?></h6>
                                         </div>
                                         <!--<div class="col-4 col-sm-4">
                                             <div class="quantity">
                                                 <input type="button" value="+" class="plus">
                                                 <input type="number" step="1" max="99" min="1" value="1" title="Qty" class="qty"
                                                        size="4"  id="quantity" name="quantity">
                                                 <input type="button" value="-" class="minus">
                                             </div>
                                         </div>-->
                                         <div class="col-2 col-sm-2 text-right">
                                             <a href="cart.php?action=remove&name=<?php echo $item["name"]; ?>&storeid=<?php echo $item["storeid"]; ?>" type="button" class="btn btn-outline-danger btn-sm">
                                                 <i class="fa fa-trash" aria-hidden="true"></i>
                                             </a>
                                         </div>
                                     </div>
                                 </div>
                                 <hr>
                                 <?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>
                                 <!-- END PRODUCT -->
                               
                            
                         </div>
                         <div class="card-footer">
                            
                             <div class="pull-right" style="margin: 10px">
 <form action="placeorder.php" method="post">
 <div class="row">
 <div class="col-sm-4">
 <div class="form-group">
    <label for="Pincode">Zipcode:</label>
    <input type="number" class="form-control" id="zipcode" placeholder="Enter Zipcode" name="zipcode" required>
 </div>
 </div>
 <div class="col-sm-8">
 <div class="form-group">
    <label for="Address">Address:</label>
    <input type="text" class="form-control" id="Address" placeholder="Enter Address" name="address" required>
 </div>
 </div>
 <div class="col-sm-4">
 <div class="form-group">
    <label for="city">City:</label>
    <input type="text" class="form-control" id="city" placeholder="Enter City" name="city" required>
 </div>
 </div>
 <div class="col-sm-4">
 <div class="form-group">
    <label for="mobile">Mobile:</label>
    <input type="number" class="form-control" id="mobile" placeholder="Enter Mobile" name="mobile" required>
 </div>
 </div>
 </div>

  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required>
  </div>
  <input type="text"  name="totalprice" class="form-control" value="<?php echo $total_price;?>" hidden>
                      
  
  <button type="submit" value="checkout" name="checkout" class="btn btn-success btn-lg pull-right">Checkout</button>
</form>

                             
                                 <div class="pull-right" style="margin: 5px">
                                     Total price: <b>₹<?php echo $total_price; ?></b>
                                 </div> 
                             </div>
                         </div>
                         <?php
                    } else {
                    ?>
                    <div class="alrt alert-danger">Your Cart is Empty</div>
                    <?php 
                    }
                    ?>
                     </div>
                     
             </div>

 <?php include_once "includes/footer.php";?>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="js/mdb.min.js"> </script>
  <script id="rendered-js" src="js/menu.js"></script>
   <script>
$(document).ready(function(){

var quantitiy=0;
   $('.plus').click(function(e){
        
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        
        // If is not undefined
            
            $('#quantity').val(quantity + 1);

          
            // Increment
        
    });

     $('.minus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        
        // If is not undefined
      
            // Increment
            if(quantity>0){
            $('#quantity').val(quantity - 1);
            }
    });
    
});
</script>
</body>

</html>
