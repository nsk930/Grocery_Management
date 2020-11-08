<?php
$supercatagory = "";
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["supercatagory"])) {
        array_push($errors, "Supercatagory name is required");
    }
    if (empty($_POST["description"])) {
        array_push($errors, "Description is required");
    }
    if (count($errors) == 0) {
        $stmt = $conn->prepare("INSERT INTO supercatagory (name,description) VALUES (?,?)");
        $stmt->bind_param("ss", $supercatagory, $description);
        $supercatagory = test_input($_POST["supercatagory"]);
        $description = test_input($_POST["description"]);
        $stmt->execute();
        $_SESSION['success']="Successfully Added";
    }
    
}


?>
<form method="post" action="index.php?supcatagory=supcatagory">
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
    <input type="text" class="form-control" id="supercatagory" name="supercatagory" placeholder="Enter Supercatagory" required>
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
   </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


    