<?php
$product = "";
$description = "";
$imagename = "";    
$subid = 0;    
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "../assets/image/product/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if (empty($_POST["product"])) {
        array_push($errors, "Product name is required");
    }
    if (empty($_POST["mrp"])) {
        array_push($errors, "Current Market Price is required");
    }
    if (empty($_POST["description"])) {
        array_push($errors, "Description is required");
    }
    if ($_POST["catagory"]=="Choose Catagory") {
        array_push($errors, "Catagory name is required");
    }
    if ($_POST["unit"]=="Choose Unit") {
        array_push($errors, "Unit name is required");
    }
    if ($_POST["brand"]=="Choose Brand") {
        $_POST["brand"] = 0;
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
        $stmt = $conn->prepare("INSERT INTO product (name,brandid,catagoryid,subid,description,image,mrp,unit) VALUES (?,?,?,?,?,?,?,?)");
        $stmt->bind_param("siiissis", $product, $brandid, $catagoryid, $subid, $description, $imagename, $mrp, $unit);
        $product = test_input($_POST["product"]);
        $description = test_input($_POST["description"]);
        $mrp = test_input($_POST["mrp"]);
        $unit = test_input($_POST["unit"]);
        $catagoryid = test_input($_POST["catagory"]);
        $sql = "SELECT * FROM catagory where id=$catagoryid";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $subid = $row['subid'];
            }
        $subid = test_input($subid);
        $brandid = test_input($_POST["brand"]);
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
<form method="post" action="index.php?product=product" enctype="multipart/form-data">
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
    <label for="brand">Brand</label>
    <select class="form-control selUser" id="brand" name="brand">
    <option>Choose Brand</option>
<?php
$sql = "SELECT * FROM brand";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>
      <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
<?php 
    }
}
 ?>
    </select>
  </div>
 <div class="form-group">
    <label for="catagory">Catagory</label>
    <select class="form-control selUser" id="catagory" name="catagory">
    <option>Choose Catagory</option>
<?php
$sql = "SELECT * FROM catagory";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>
      <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
<?php 
    }
}
 ?>
    </select>
  </div>
  <div class="form-group">
    <label for="unit">Unit</label>
    <select class="form-control selUser" id="unit" name="unit">
    <option>Choose Unit</option>
<?php
$sql = "SELECT * FROM unit";
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
  <div class="form-group">
    <label for="product">Product</label>
    <input type="text" class="form-control" id="product" name="product" placeholder="Enter Product" required>
  </div>
  <div class="form-group">
    <label for="mrp">Current Market Price</label>
    <input type="number" class="form-control" id="mrp" name="mrp" placeholder="Enter Price" required>
  </div>
  <div class="form-group">
    <label for="fileToUpload">Image</label>
    <input type="file" class="form-control-file" id="fileToUpload" name="fileToUpload" required>
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" name="description" id="description" rows="3" value="<?php echo $description;?>"></textarea>
   </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


    