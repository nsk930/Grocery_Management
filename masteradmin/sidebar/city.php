<?php
$city = "";
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["city"])) {
        array_push($errors, "City name is required");
    }
    if ($_POST["district"] == "Choose District") {
      array_push($errors, "District name is required");
  }
    if (count($errors) == 0) {
        $stmt = $conn->prepare("INSERT INTO city (name,districtid) VALUES (?,?)");
        $stmt->bind_param("si", $city, $districtid);
        $city = test_input($_POST["city"]);
        $districtid = test_input($_POST["district"]);
        $stmt->execute();
        $_SESSION['success']="Successfully Added";
    }
    
}


?>
<form method="post" action="index.php?city=city">
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
    <label for="district">District</label>
    <select class="form-control selUser" id="district" name="district" required>
    <option>Choose District</option>
<?php
$sql = "SELECT * FROM district";
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
    <label for="city">City</label>
    <input type="text" class="form-control" id="city" name="city" placeholder="Enter City" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


    