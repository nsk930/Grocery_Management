<?php
$district = "";
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["district"])) {
        array_push($errors, "District name is required");
    }
    if ($_POST["state"]=="Choose State") {
        array_push($errors, "State name is required");
    }
    if (count($errors) == 0) {
        $stmt = $conn->prepare("INSERT INTO district (name,stateid) VALUES (?,?)");
        $stmt->bind_param("si", $district, $stateid);
        $district = test_input($_POST["district"]);
        $stateid = test_input($_POST["state"]);
        $stmt->execute();
        $_SESSION['success']="Successfully Added";
    }
    
}


?>
<form method="post" action="index.php?district=district">
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
    <label for="state">State</label>
    <select class="form-control selUser" id="state" name="state">
    <option>Choose State</option>
<?php
$sql = "SELECT * FROM state";
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
    <label for="district">District</label>
    <input type="text" class="form-control" id="district" name="district" placeholder="Enter District" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


    