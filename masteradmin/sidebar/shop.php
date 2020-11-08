<?php
$store = "";
$imagename = "";    
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $target_dir = "../assets/image/shops/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    if (empty($_POST["store"])) {
        array_push($errors, "Store name is required");
    }
    if (empty($_POST["address"])) {
      array_push($errors, "Address is required");
  }
    if ($_POST["streetid"]== "Choose Zipcode") {
        array_push($errors, "Zipcode is required");
    }
     if ($_POST["productcat"]== "Choose Product Catagory") {
        array_push($errors, "Product Catagory is required");
    }
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        array_push($errors, "File is not an image");
        $uploadOk = 0;
    }
// Check if file already exists
if (file_exists($target_file)) {
    array_push($errors, "Sorry, file already exists");
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    array_push($errors, "Sorry, your file is too large");
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    array_push($errors, "Sorry, only JPG, JPEG, PNG & GIF files are allowed");
    $uploadOk = 0;
}
    if (count($errors) == 0) {
        $stmt = $conn->prepare("INSERT INTO store (name,address,productcat,streetid, image) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssis", $store, $address ,$productcat, $streetid, $imagename);
        $store = test_input($_POST["store"]);
        $address = test_input($_POST["address"]);
        $productcat = test_input($_POST["productcat"]);
        $streetid = test_input($_POST["streetid"]);
        $imagename= $_FILES["fileToUpload"]["name"];
        $imagename = test_input($imagename);
        $stmt->execute();
               // Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  array_push($errors, "Sorry, your file was not uploaded");
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      $_SESSION['success']="Successfully Added";
  } else {
      array_push($errors, "Sorry, there was an error uploading your file.");
  }
}
    }
    
}


?>
<form method="post" action="index.php?shop=shop" enctype="multipart/form-data">
<?php include('errors.php'); ?>
 <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success">
          <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
          ?>
        </div>
 <?php endif;?>
<div class="form-group">
    <label for="streetid">Zipcode</label>
    <select class="form-control selUser" id="streetid" name="streetid">
    <option>Choose Zipcode</option>
<?php
$sql = "SELECT * FROM street";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>
      <option value="<?php echo $row['id'];?>"><?php echo $row['zipcode'];?></option>
<?php 
    }
}
 ?>
    </select>
  </div>
  <div class="form-group">
    <label for="store">Store Name</label>
    <input type="text" class="form-control" id="store" name="store" placeholder="Enter Store Name" required>
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
  </div>
  <div class="form-group">
    <label for="fileToUpload">Image</label>
    <input type="file" class="form-control-file" id="fileToUpload" name="fileToUpload" required>
  </div>
  <div class="form-group">
    <label for="productcat">Primary Product Catagory</label>
    <select class="form-control selUser" id="productcat" name="productcat">
    <option>Choose Primary Product Catagory</option>
<?php
$sql = "SELECT * FROM supercatagory";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>
      <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
<?php 
    }
}
 ?>
    </select>
  </div>
  
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


    