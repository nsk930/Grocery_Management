<?php
$store = "";
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
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
    if (count($errors) == 0) {
        $stmt = $conn->prepare("INSERT INTO store (name,address,storemanagerid, productcat,streetid) VALUES (?,?,?,?,?)");
        $stmt->bind_param("ssisi", $store, $address , $uid , $productcat, $streetid);
        $store = test_input($_POST["store"]);
        $address = test_input($_POST["address"]);
        $productcat = test_input($_POST["productcat"]);
        $streetid = test_input($_POST["streetid"]);
        $stmt->execute();
        $_SESSION['success']="Successfully Added";
    }
    
}


?>
<form method="post" action="index.php?buisness=buisness">
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


    