<?php
include_once("db_connect.php");
if(isset($_POST['btn-save'])) {
	$user_name = $_POST['user_name'];
	$user_email = $_POST['user_email'];
	$user_password = $_POST['password'];	
	$sql = "SELECT email FROM users WHERE email='$user_email'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();	
	if(!$row['email']){	
		$stmt = $conn->prepare("INSERT INTO users (user,pass,email) VALUES (?,?,?)");
        $stmt->bind_param("sss", $user_name, $user_password, $user_email);
					
		echo "registered";
	} else {				
		echo "1";	 
	}
}
?>