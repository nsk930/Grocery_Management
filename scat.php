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
  $sid = test_input($_GET["sid"]);
  $sid = $conn -> real_escape_string($sid);
  $sql = "SELECT * FROM supercatagory where id=$sid";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
$product = $row['name'];
$id = $row['id'];
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
      <div class="row">
      <div class="list-group mr-2 mt-4 d-none d-sm-block">
            <a href="scat?sid=<?php echo $id;?>" class="list-group-item list-group-item-action active">
            <?php echo $product;?>
            </a>
            <?php $sql = "SELECT * FROM subcatagory where supid = $id";
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
         
          <div class="col-12 col-sm-10 bg-white mt-4" id="items">
              <p class="mt-2 font-weight-light"><small> <a href="index">Home</a> > <?php echo $product;?> </small></p>
               <div class="row">
                <div class="col-sm-9 col-6"> 
                    <h5><?php echo $product;?></h5>
                </div> 
               
               </div>
               <hr>
              <?php
    $sql = "SELECT * FROM subcatagory";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
    ?>
       <a href="subcat?subid=<?php echo $row['id'];?>">
        <div class="media bg-light p-3 mb-2">
          <div class="row">
            <div class="col-3">
                <img class="align-self-center mr-3 img-fluid mt-2" src="assets/image/subcatagory/<?php echo $row['image'];?>" alt="Generic placeholder image">
            </div>
         
                  <div class="media-body col-9  mt-2">
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
