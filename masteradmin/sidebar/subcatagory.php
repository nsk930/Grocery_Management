<?php
$subcatagory = "";
$description = "";
$imagename = "";    
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "../assets/image/subcatagory/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if (empty($_POST["subcatagory"])) {
        array_push($errors, "Subcatagory name is required");
    }
    if (empty($_POST["description"])) {
        array_push($errors, "Description is required");
    }
    if ($_POST["supercatagory"]=="Choose Supercatagory") {
        array_push($errors, "Supercatagory name is required");
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
        $stmt = $conn->prepare("INSERT INTO subcatagory (name,supid,description,image) VALUES (?,?,?,?)");
        $stmt->bind_param("siss", $subcatagory, $supid, $description, $imagename);
        $subcatagory = test_input($_POST["subcatagory"]);
        $description = test_input($_POST["description"]);
        $supid = test_input($_POST["supercatagory"]);
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
<form method="post" action="index.php?subcatagory=subcatagory" enctype="multipart/form-data">
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
    <label for="supercatagory">Supercatagory</label>
    <select class="form-control selUser" id="supercatagory" name="supercatagory">
    <option>Choose Supercatagory</option>
<?php
$sql = "SELECT * FROM supercatagory";
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
    <label for="subcatagory">Subcatagory</label>
    <input type="text" class="form-control" id="subcatagory" name="subcatagory" placeholder="Enter Subcatagory" required>
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


    