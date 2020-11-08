<?php
session_start();  
include_once"includes/connect.php";
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  if (!isset($_SESSION['email'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login');
 }else{
    $email = $_SESSION['email'];
    $user = $_SESSION['name'];
    $uid = $_SESSION['uid'];
 
 }
if(isset($_POST["checkout"])){

  
        $stmt = $conn->prepare("INSERT INTO transaction (userid, transactionid, name,total,address,zipcode,mobile,city) VALUES (?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssss", $uid, $transaction, $name, $totalprice, $address, $zipcode, $mobile, $city);
        
        $zipcode = test_input($_POST["zipcode"]);
        $address = test_input($_POST["address"]);
        $city = test_input($_POST["city"]);
        $mobile = test_input($_POST["mobile"]);
        $name = test_input($_POST["name"]);
        $totalprice = test_input($_POST["totalprice"]);
        $sql = "SELECT * FROM transaction order by id desc";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
           $row = $result->fetch_assoc();
            $id = $row['id'];
        }
        if($id!=0){
        $transaction = md5($id.$uid);
        $_SESSION['transaction'] = $transaction;
        }
        $sql = "SELECT * FROM users where uid=$uid";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   $row = $result->fetch_assoc();
    $username = $row['user'];
}
        if($stmt->execute()){
            include 'src/instamojo.php';

$api = new Instamojo\Instamojo('test_d0ca4f78fd4f5d0a6cd48c2bd9d', 'test_4945979da1bc72452f9b5c20d72','https://test.instamojo.com/api/1.1/');
try {
    $response = $api->paymentRequestCreate(array(
        "amount" => $totalprice,
        "buyer_name" => $username,
        "purpose" => "Shopping",
        "phone" => $mobile,
        "send_email" => true,
        "send_sms" => true,
        "email" => $email,
        'allow_repeated_payments' => true,
        "redirect_url" => "http://wildwingsindia.in/grocery/success.php",
        "webhook" => "http://wildwingsindia.in/grocery/webhook.php"
        ));
    $pay_ulr = $response['longurl'];
    
    //Redirect($response['longurl'],302); //Go to Payment page

    header("Location: $pay_ulr");
    exit();

}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}    
}else{
    echo "not possible";
}

}

?>