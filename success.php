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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Grocery Mart</title>
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
    <div class="container">

      <div class="page-header mt-2 mt-sm-0">
          <div class="alert alert-danger mt-4">Do not refresh or go backward from this page</div>
        <h1><a href="index.php">Order Placed</a></h1>
        </div>

      <h3 style="color:#6da552">Thank You, Payment success!!</h3>
<a href="myorder" class="btn btn-success">See Your Orders</a>  

 <?php

include 'src/instamojo.php';

$api = new Instamojo\Instamojo('test_d0ca4f78fd4f5d0a6cd48c2bd9d', 'test_4945979da1bc72452f9b5c20d72','https://test.instamojo.com/api/1.1/');

$payid = $_GET["payment_request_id"];


try {
    $response = $api->paymentRequestStatus($payid);


    echo "<h4>Payment ID: " . $response['payments'][0]['payment_id'] . "</h4>" ;
    echo "<h4>Payment Name: " . $response['payments'][0]['buyer_name'] . "</h4>" ;
    echo "<h4>Payment Email: " . $response['payments'][0]['buyer_email'] . "</h4>" ;
    echo "<h4>Payment Phone: " . $response['payments'][0]['buyer_phone'] . "</h4>" ;
     echo "<h4>Total: " . $response['payments'][0]['unit_price'] . "</h4>" ;

     if(!empty($_SESSION["cartitem"])) {
        if (isset($_SESSION['transaction'])) {
        $transaction = $_SESSION['transaction'];
        echo "<h4>Transaction ID: ".$transaction."</h4>";
        $sql1 = "SELECT * FROM transaction where transactionid='$transaction'";
        $result = $conn->query($sql1);
        if ($result->num_rows > 0) {
           $row = $result->fetch_assoc();
            $trans_id = $row['id'];
        }
       
        $sql = "";
        foreach($_SESSION["cartitem"] as $k => $v) {
$itemid = $_SESSION["cartitem"][$k]["prodid"];
$quantity = $_SESSION["cartitem"][$k]["quantity"];

$sql2 = "SELECT * FROM items where id='$itemid'";
$result2 = $conn->query($sql2);
if ($result2->num_rows > 0) {
   $row2 = $result2->fetch_assoc();
    $rate = $row2['rate'];
    $storeid = $row2['storeid'];
}
$total= $rate*$quantity;
     $sql .= "INSERT INTO orders (userid, itemid,quantity, trans_id, total)
     VALUES ($uid, $itemid,$quantity, $trans_id, $total);";
     
     $sql3 = "SELECT * FROM store where id='$storeid'";
     $result3 = $conn->query($sql3);
     if ($result3->num_rows > 0) {
        $row3 = $result3->fetch_assoc();
         $account = $row3['account'];
     }
     $account +=$total;
     $sql4 = "UPDATE store SET account='$account' WHERE id='$storeid'";
     $conn->query($sql4);
    }
     $conn->multi_query($sql);
     
    }
} 
     }catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}


  ?>


      
    </div> <!-- /container -->


    <?php include_once "includes/footer.php";?>


<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/mdb.min.js"> </script>
<script id="rendered-js" src="js/menu.js"></script>
  </body>
</html>