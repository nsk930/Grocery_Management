<?php
header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");
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
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$storeid = test_input($_GET["storeid"]);
$storeid = $conn -> real_escape_string($storeid);
$sql = "SELECT * FROM store where id=$storeid";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
  $storename = $row['name'];
  $productcat = $row['productcat'];
 $image = $row['image'];
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

  <title>Shop</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="fontawesome/css/all.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css" integrity="sha256-rFMLRbqAytD9ic/37Rnzr2Ycy/RlpxE5QH52h7VoIZo=" crossorigin="anonymous"/>
 <link rel="stylesheet" href="css/mdb.min.css">
 
  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">
  <link href="css/menu.css" rel="stylesheet">
  <link href="css/bootstrap-glyphicons.css" rel="stylesheet">

</head>

<body>
<?php include_once"includes/navbar.php";?>

  <!-- Page Content -->
  <div class="container">
        <div class="navbar fixed-bottom p-0 m-0">
                <div class="d-none d-sm-block col-sm-12">
                      <a href="cart"><button type="button" class="btn btn-block btn-primary">Go to cart</button></a>
                </div>
                <div class="d-block d-sm-none col-12">
                      <a href="cart"><button type="button" class="btn btn-sm btn-block btn-primary">Go to cart</button></a>
                </div>
        </div>
    <div class="row border mt-sm-2 mt-4 bg-light p-4">
    
      <div class="col-lg-6">
	
        <div class="card">
          <img class="card-img-top img-fluid" src="assets/image/shops/<?php echo $image;?>" alt="">
         
        </div>
        <!-- /.card -->
	</div>
	<div class="col-lg-6">
            <h3 class="card-title"><?php echo $storename;?></h3>
            <h6><?php echo $productcat;?></h6>
            <hr>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente dicta fugit fugiat hic aliquam itaque facere, soluta. Totam id dolores, sint aperiam sequi pariatur praesentium animi perspiciatis molestias iure, ducimus!</p>
            <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
            4.0 stars<br>
			
    </div>
</div>
          
<div class="row">
	<div class="col-12">
        <div class="card card-outline-secondary my-2">
          <div class="card-header">
            <div class="row">
                <div class="col-sm-9 align-self-center">
                <h4>List of products</h4>
                </div>
                <div class="col-sm-3">
                        <select class="custom-select">
                            <option value="1">Popularity</option>
                            <option value="2">Price - Low to High</option>
                            <option value="3">Price - How to Low</option>
                            <option value="3">Alphabetical</option>

                        </select>
                    </div>
                    <input class="form-control mt-2 mx-3" type="text" placeholder="Search for product ...." id="Search" title="Type in a name">

                     </div>    
          </div>
          <div class="card-body">
<?php
require_once("dbcontroller.php");
$db_handle = new DBController();

$sql = "SELECT * FROM items where storeid=$storeid";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc())
  {
    $id = $row['id'];
    $prodid = $row['prodid'];
    $rate = $row['rate'];
    $stock = $row['stock'];

    $product_array = $db_handle->runQuery("SELECT * FROM product where id = $prodid");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
   
    ?>
    <form method="post" action="shop?storeid=<?php echo $storeid;?>&action=add&id=<?php echo $product_array[$key]["id"]; ?>">
            <div class="media">
            <div class="col-2">
                <img class="align-self-center mr-3 img-fluid" src="assets/image/product/<?php echo $product_array[$key]["image"]; ?>" alt="Generic placeholder image">
            </div>
                  <div class="media-body">
                    <div class="row">
                        <h5 class="col-12 mt-0"><?php echo $product_array[$key]["name"]; ?></h5>
  <h6 class="col-12">₹<?php echo $rate; if($stock>0){?> <span class="text-success">In stock</span><?php } else{?> <span class="text-danger">Out of stock</span> <?php }?></h6>
                        <p class="col-12 col-sm-6 small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente dicta fugit fugiat hic aliquam itaque facere, soluta. Totam id dolores, sint aperiam sequi pariatur praesentium animi perspiciatis molestias iure, ducimus!</p>
                        <input type="text"  name="price" class="form-control" value="<?php echo $rate;?>" hidden>
                        <input type="text"  name="storename" class="form-control" value="<?php echo $storename;?>" hidden>
                        <input type="text"  name="storeid" class="form-control" value="<?php echo $storeid;?>" hidden>
                        <input type="text"  name="prodid" class="form-control" value="<?php echo $id;?>" hidden>
                         <?php  if($stock>0){?>
                        <div class="input-group col-12 col-sm-3">
                            <span class="input-group-btn">
                                <button type="button" id="decr<?php echo $id;?>" class="quantity-left-minus btn btn-sm btn-danger btn-number"  data-type="minus" data-field="">
                                <span class="glyphicon glyphicon-minus"></span>
                                </button>
                            </span>
                            <input type="text" id="quantity<?php echo $id;?>" name="quantity" class="form-control input-number" value="0" min="1" max="100">
                            <span class="input-group-btn">
                                <button type="button" id="incr<?php echo $id;?>" class="quantity-right-plus btn btn-sm btn-success btn-number" data-type="plus" data-field="">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </button>
                            </span>
                        </div>
                        <div class="col-12 col-sm-3"> <button href="#" class="btn btn-primary text-white mt-2 mt-sm-0"><i class="fa-sm fa fa-cart-plus"></i> Add to cart </button></div>
                         <?php } ?> 
                    </div>
                    <hr>
                   </div>
                   
              </div>
              </form>
              
  <?php }
}
  }
}
?>
            
             
      
            
          </div>
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col-lg-9 -->

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
  <script>
        $(document).ready(function(){
      
       <?php   $sql = "SELECT * FROM items where storeid=$storeid";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc())
  {
    $id = $row['id'];
    
    ?>
      var quantity<?php echo $id;?>=0;
         $('#incr<?php echo $id;?>').click(function(e){
              
              // Stop acting like a button
              e.preventDefault();
              // Get the field name
              var quantity<?php echo $id;?> = parseInt($('#quantity<?php echo $id;?>').val());
              
              // If is not undefined
                  
                  $('#quantity<?php echo $id;?>').val(quantity<?php echo $id;?> + 1);
      
                
                  // Increment
              
          });
      
           $('#decr<?php echo $id;?>').click(function(e){
              // Stop acting like a button
              e.preventDefault();
              // Get the field name
              var quantity<?php echo $id;?> = parseInt($('#quantity<?php echo $id;?>').val());
              
              // If is not undefined
            
                  // Increment
                  if(quantity<?php echo $id;?>>0){
                  $('#quantity<?php echo $id;?>').val(quantity<?php echo $id;?> - 1);
                  }
          });

        <?php }
         } ?>
          
          
      });
      </script>
      <!--product search-->
      <script>
            $("#Search").on("keyup", function () {
            val = $(this).val().toLowerCase();
            $(".media").each(function () {
              $(this).toggle($(this).text().toLowerCase().includes(val));
            });
          });
          </script>
</body>

</html>
<?php
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByid = $db_handle->runQuery("SELECT * FROM product WHERE id='" . $_GET["id"] . "'");
			$itemArray = array($productByid[0]["id"]=>array('name'=>$productByid[0]["name"], 'id'=>$productByid[0]["id"], 'quantity'=>$_POST["quantity"], 'price'=>$_POST["price"], 'storeid'=>$_POST["storeid"], 'storename'=>$_POST["storename"],  'prodid'=>$_POST["prodid"], 'image'=>$productByid[0]["image"]));
			
			if(!empty($_SESSION["cartitem"])) {
				if(in_array($productByid[0]["id"],array_keys($_SESSION["cartitem"]))) {
					foreach($_SESSION["cartitem"] as $k => $v) {
							if($productByid[0]["id"] == $k) {
								if(empty($_SESSION["cartitem"][$k]["quantity"])) {
									$_SESSION["cartitem"][$k]["quantity"] = 0;
								}
								$_SESSION["cartitem"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cartitem"] = array_merge($_SESSION["cartitem"],$itemArray);
				}
			} else {
				$_SESSION["cartitem"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cartitem"])) {
			foreach($_SESSION["cartitem"] as $k => $v) {
					if($_GET["id"] == $k)
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