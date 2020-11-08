<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Panel</title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../fontawesome/css/all.css" rel="stylesheet">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css" integrity="sha256-rFMLRbqAytD9ic/37Rnzr2Ycy/RlpxE5QH52h7VoIZo=" crossorigin="anonymous" />

  <!-- Custom styles for this template -->
  <link href="../css/shop-homepage.css" rel="stylesheet">
  <link href="css/menu.css" rel="stylesheet">

<!-- CSS -->
<link href='select2/dist/css/select2.min.css' rel='stylesheet' type='text/css'>
</head>

<body>

  <!-- Navigation -->
  <?php include_once"includes/navbar.php";?>
  

<div class="container">

<?php include_once"includes/connect.php";
$errors = array();

				if(isset($_GET['district']))

				{

				include('sidebar/district.php');	

                }

                if(isset($_GET['city']))

				{

				include('sidebar/city.php');	

                }
                if(isset($_GET['street']))

				{

				include('sidebar/street.php');	

				}

                if(isset($_GET['supcatagory']))

				{

				include('sidebar/supcatagory.php');	

        }
        if(isset($_GET['subcatagory']))

				{

				include('sidebar/subcatagory.php');	

        }
        if(isset($_GET['catagory']))

				{

				include('sidebar/catagory.php');	

        }
        if(isset($_GET['brand']))

				{

				include('sidebar/brand.php');	

        }
        if(isset($_GET['product']))

				{

				include('sidebar/product.php');	

        }
        if(isset($_GET['shop']))

				{

				include('sidebar/shop.php');	

				}

	?>
</div>

<?php //include_once "includes/footer.php"; ?>
  <!-- Bootstrap core JavaScript -->

  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script id="rendered-js" src="js/menu.js"></script>
  <script src='select2/dist/js/select2.min.js' type='text/javascript'></script>
  <script>
        $(document).ready(function(){
            
            // Initialize select2
            $(".selUser").select2();

       
        });
    </script>

</body>

</html>
