<?php
$brand = "";
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["brand"])) {
        array_push($errors, "Brand name is required");
    }
    if (empty($_POST["description"])) {
        array_push($errors, "Description is required");
    }
    if (count($errors) == 0) {
        $stmt = $conn->prepare("INSERT INTO brand (name,description) VALUES (?,?)");
        $stmt->bind_param("ss", $brand, $description);
        $brand = test_input($_POST["brand"]);
        $description = test_input($_POST["description"]);
        $stmt->execute();
        $_SESSION['success']="Successfully Added";
    }
    
}


?>
<form method="post" action="index.php?brand=brand">
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
    <input type="text" class="form-control" id="brand" name="brand" placeholder="Enter Brand" required>
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
   </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


    