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
  $storeid=$_GET['storeid'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
    if (empty($_POST["stock"])) {
        array_push($errors, "Stock information is required");
    }
  
    if ($_POST["product"]=="Choose Product") {
        array_push($errors, "Product name is required");
    }
    if (empty($_POST["rate"])) {
        array_push($errors, "Rate information is required");
    }
  

    if (count($errors) == 0) {
        $stmt = $conn->prepare("INSERT INTO items (prodid,storeid,rate,stock) VALUES (?,?,?,?)");
        $stmt->bind_param("iiii", $prodid, $storeid, $rate, $stock);
        $prodid = test_input($_POST["product"]);
        $rate = test_input($_POST["rate"]);
        $stock = test_input($_POST["stock"]);
        $storeid = test_input($storeid);
        $stmt->execute();
        $_SESSION['success']="Successfully Added";

    }
    
}
?>
<form method="post" action="index.php?items=items&storeid=<?php echo $storeid;?>">
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
    <label for="product">Product</label>
    <select class="form-control selUser" id="product" name="product">
    <option>Choose Product</option>
<?php
$sql = "SELECT * FROM product";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>
      <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?> (MRP Rs.<?php echo $row['mrp'];?>/<?php echo $row['unit'];?> )</option>
<?php 
    }
}
 ?>
    </select>
  </div>
 
 
  <div class="form-group">
    <label for="product">Rate (in Rs.)</label>
    <input type="number" class="form-control" id="rate" name="rate" placeholder="Enter Rate" required>
  </div>
  <div class="row">
  <div class="form-group col-8 col-sm-4">
    <label for="stock">Your Stock</label>
    <input type="number" class="form-control" id="stock" name="stock" placeholder="Enter number of stocks" required>
  </div>

  <div class="form-group col-4 col-sm-4">
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
</div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


    