<?php
session_start();  
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  include('config.php');
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

        
          
          <div class="container my-4">
	<h3 class="text-center display-4">Search Result</h3>
	<ol>
    <b>Product SEARCH RESULT</b>
    <div class="alert alert-light p-5 mt-2">
<?php
if(isset($_POST['qu'])){
$search = test_input($_POST['qu']);;
  $find = mysqli_query($db,"SELECT * From product WHERE name LIKE '%$search%'");

  $rowcount=mysqli_num_rows($find);
if($rowcount !=0)
{
	?><p class="alert alert-success">Result Found</p>
	
	<?php
    $s="";
  while($row = mysqli_fetch_assoc($find))
    {
	
        $s=$s."
        <a class='link-p-colr' href='subcat?subid=".$row['subid']."&catid=".$row['catagoryid']."&prodid=".$row['id']."'>
            <div class='live-outer'>
                    <div class='live-im'>
                        <img src='assets/image/product/".$row['image']."'/>
                    </div>
                    <div class='live-product-det'>
                        <div class='live-product-name'>
                            <p>".$row['name']."</p>
                        </div>
                        <div class='live-product-price'>
                            <div class='live-product-price-text'><p>Rs.".$row['mrp']."/.".$row['unit'].".</p></div>
                        </div>
                    </div>
                </div>
        </a>
        "	;
  }
  echo $s;
}else{
  ?><p class="alert alert-danger">No Result Found</p> 
<?php }
}
?>
</div>
  
	</ol>

</div>

         

  <?php include_once"includes/footer.php"; ?>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/mdb.min.js"> </script>
<script id="rendered-js" src="js/menu.js"></script>
<!-- To prevent form resubmission -->

</body>

</html>