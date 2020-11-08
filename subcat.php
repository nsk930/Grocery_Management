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
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  $subid = test_input($_GET["subid"]);
  $subid = $conn -> real_escape_string($subid);
  $sql = "SELECT * FROM subcatagory where id=$subid";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
$product = $row['name'];
$supid = $row['supid'];
$subid= $row['id'];
}else{
  header("Location:index");
}
$sql = "SELECT * FROM supercatagory where id=$supid";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row1 = $result->fetch_assoc();
$supcat = $row1['name'];
}
  ?>
  <!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Grocery Mart | <?php echo $product; ?></title>

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
      <div class="row">
          <div class="col-sm d-none d-sm-block">
                        <div class="list-group mt-4">
                                <a href="scat?sid=<?php echo $supid;?>" class="list-group-item list-group-item-action active">
                                <?php echo $supcat;?>
                                </a>
                                <?php $sql = "SELECT * FROM subcatagory";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                while($rows = $result->fetch_assoc()) {
                                        ?>
                                <a href="subcat?subid=<?php echo $rows['id'];?>" class="list-group-item list-group-item-action"><?php echo $rows['name'];?></a>
                                <?php
                                                }
                                                }
                                            ?> 
                        </div>
                        <div class="list-group mt-1 mb-2">
                                <a href="subcat?subid=<?php echo $subid;?>" class="list-group-item list-group-item-action active">
                                <?php echo $product;?>
                                </a>
                                <?php $sql = "SELECT * FROM catagory where subid = $subid";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                while($rows = $result->fetch_assoc()) {
                                        ?>
                                <a href="subcat?subid=<?php echo $subid;?>&catid=<?php echo $rows['id'];?>" class="list-group-item list-group-item-action small"><?php echo $rows['name'];?></a>
                                <?php
                                                }
                                                }
                                            ?> 
                        </div>
                  </div>
                
          <div class="col-12 col-sm-10 border border-primary bg-white mt-4" id="items">
          <?php 
                 
                  if(isset($_GET['subid']) && isset($_GET['catid']) && isset($_GET['prodid']))
                  {
                    include('sidebar/shops.php');	
                  }
                  else if(isset($_GET['subid']) && isset($_GET['catid']))
                  {
                    include('sidebar/product.php');	
                  }
                  else if(isset($_GET['subid']))
                  {         
                  include('sidebar/catagory.php');	
                  }
            ?>
              
    
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
