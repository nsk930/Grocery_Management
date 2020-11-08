<?php
$street = "";
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["street"])) {
        array_push($errors, "Street name is required");
    }
    if (empty($_POST["zipcode"])) {
      array_push($errors, "Zipcode is required");
  }
    if ($_POST["city"]== "Choose City") {
        array_push($errors, "City name is required");
    }
    if (count($errors) == 0) {
        $stmt = $conn->prepare("INSERT INTO street (name,cityid,zipcode) VALUES (?,?,?)");
        $stmt->bind_param("sii", $street, $cityid ,$zipcode);
        $street = test_input($_POST["street"]);
        $zipcode = test_input($_POST["zipcode"]);
        $cityid = test_input($_POST["city"]);
        $stmt->execute();
        $_SESSION['success']="Successfully Added";
    }
    
}


?>
<form method="post" action="index.php?street=street">
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
    <label for="city">City</label>
    <select class="form-control selUser" id="city" name="city">
    <option>Choose City</option>
<?php
$sql = "SELECT * FROM city";
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
    <label for="street">Locality</label>
    <input type="text" class="form-control" id="street" name="street" placeholder="Enter Locality" required>
  </div>
  <div class="form-group">
    <label for="zipcode">Zipcode</label>
    <input type="text" maxlength="6" class="form-control" id="zipcode" name="zipcode" placeholder="Enter Zipcode" required>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


    