

<?php 
$pass = 0;
require_once "../control.php";
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        $roles = $fetch_info['roles'];
        $id = $fetch_info['userID'];
        if($status == "verified"){
            if($code != 0){
                header('Location: ../reset-code.php');
            }
        }else{
            header('Location: ../user-otp.php');
        }
        if($roles == 1 ){
            header('Location: ../admin/index.php');
        }
        if($roles == 2){
            $title = "Gamer";
          
        }
    }
}else{
    header('Location: ../login.php');
}

if(isset($_POST['profile'])){
    if($_FILES['lis_img0']['name']!=''){
        $lis_img0 = $_FILES['lis_img0']['name'];
        }
        else{
          $lis_img0 = $details['productImage'];
        }
        $tempname = $_FILES['lis_img0']['tmp_name'];
        $folder = "../assets/images/profiles/".$lis_img0;
    $fname = $_POST['first'];
    $lname = $_POST['last'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    move_uploaded_file($tempname, $folder);
    $update = mysqli_query($con, "UPDATE users SET profile = '$lis_img0', first_name= '$fname', last_name= '$lname', email= '$email', contact= '$number', address= '$address' WHERE userID = $id");
    if($update){
        echo "<script>alert('Update Profile Successfully');window.location.href='profile.php'</script>";
    }else{
        echo "<script>alert('Update Profile not Successful');window.location.href='profile.php'</script>";
    }
}

if (isset($_GET['purchase'])) {
    date_default_timezone_set('Asia/Manila');

    $purchaseID =  $_GET['purchase'];
    $currentDateTime = new DateTime();
    $formattedDateTime = $currentDateTime->format('F-d-Y g:ia');
    $transactionID = "SKU".rand(1111,9999)."-".rand(1111,9999)."-".rand(1111,9999);
    $insert = mysqli_query($con,"INSERT INTO orders(productID,date_ordered,TransactionID,userID) VALUES('$purchaseID','$formattedDateTime','$transactionID','$id')");
    if($insert){
        echo "<script>alert('Proceed to payment processes');window.location.href='unpaid.php'</script>";
    }else{
        echo "<script>alert('Denied Purchase, please try again');window.location.href='unpaid.php'</script>";
    }
   
}


if (isset($_GET['paynow'])) {
    $paynow = $_GET['paynow'];
    $unpaid = mysqli_query($con,"SELECT product.productName, product.productPrice , orders.TransactionID , orders.Status, orders.ordersID , orders.date_ordered from orders join product on product.productID = orders.productID WHERE orders.ordersID = $paynow");
    $details = mysqli_fetch_assoc($unpaid);
}

if (isset($_POST['paynows'])) {
    if(empty($_POST['mop'])){
        $errors['mop'] = "Please Select Mode of payment";
    }else {
        $mop = $_POST['mop'];
    }
    if(empty($_POST['transation'])){
        $errors['transation'] = "Please input Transaction Code";
    }else {
        $transation = $_POST['transation'];
    }

    if(count($errors) === 0){
        $update = mysqli_query($con,"UPDATE orders SET MOP = '$mop', Transaction_code = '$transation', Status ='validating' WHERE ordersID = $paynow");
        if($update){
            echo "<script>alert('Payment Success, wait for validation');window.location.href='validate.php'</script>";
        }else{
            echo "<script>alert('Denied Purchase, please try again');window.location.href='validate.php'</script>";
        }
    }

}
if (isset($_GET['cancelnow'])) {
    $cancelnow = $_GET['cancelnow'];
    $update = mysqli_query($con,"UPDATE orders SET  Status ='cancelled' WHERE ordersID = $cancelnow");
    if($update){
        echo "<script>alert('Cancelled order');window.location.href='index.php'</script>";
    }else{
        echo "<script>alert('Denied Cancelled, please try again');window.location.href='index.php'</script>";
    }
}

if (isset($_GET['rate'])) {
    $rate = $_GET['rate'];
}

if (isset($_POST['ratings'])) {
    if(empty($_POST['stars'])){
        $stars = 3;
    }else {
        $stars = $_POST['stars'];
    }
    $update = mysqli_query($con,"UPDATE orders SET  Rate ='$stars', Status ='rated'  WHERE ordersID = $rate");
    if($update){
        echo "<script>alert('Rated Succesfully');window.location.href='finished.php'</script>";
    }else{
        echo "<script>alert('Rated Denied, please try again');window.location.href='finished.php'</script>";
    }
}

$unpaid = mysqli_query($con,"SELECT product.productName, product.productPrice, orders.TransactionID, orders.Status, orders.ordersID, orders.date_ordered 
FROM orders 
JOIN product ON product.productID = orders.productID 
WHERE (orders.Status = 'unpaid') AND orders.userID = $id;
");

$cancelled = mysqli_query($con,"SELECT product.productName, product.productPrice, orders.TransactionID, orders.Status, orders.ordersID, orders.date_ordered 
FROM orders 
JOIN product ON product.productID = orders.productID 
WHERE (orders.Status = 'cancelled') AND orders.userID = $id;
");

$validating = mysqli_query($con,"SELECT product.productName, product.productPrice, orders.TransactionID, orders.Status, orders.ordersID, orders.date_ordered 
FROM orders 
JOIN product ON product.productID = orders.productID 
WHERE (orders.Status = 'validating') AND orders.userID = $id;
");

$unpaidcnt = mysqli_query($con,"SELECT COUNT(Status) unpaid from orders WHERE Status = 'unpaid' AND userID  = $id");
$unpaidcnt = mysqli_fetch_assoc($unpaidcnt);


$validati = mysqli_query($con,"SELECT COUNT(Status) validating from orders WHERE Status = 'validating' AND userID  = $id");
$valid = mysqli_fetch_assoc($validati);

$paidw = mysqli_query($con,"SELECT COUNT(Status) paid from orders WHERE Status = 'paid' AND userID  = $id");
$paidww = mysqli_fetch_assoc($paidw);

$ratedz = mysqli_query($con,"SELECT COUNT(Status) rate from orders WHERE Status = 'rated' AND userID  = $id");
$rateds = mysqli_fetch_assoc($ratedz);

$paid = mysqli_query($con,"SELECT product.productName, product.files, product.productPrice, orders.TransactionID, orders.Status, orders.ordersID, orders.date_ordered 
FROM orders 
JOIN product ON product.productID = orders.productID 
WHERE (orders.Status = 'paid') AND orders.userID = $id;
");

$fini = mysqli_query($con,"SELECT product.productName, product.files, product.productPrice, orders.TransactionID, orders.Status, orders.ordersID,  orders.Rate, orders.date_ordered 
FROM orders 
JOIN product ON product.productID = orders.productID 
WHERE (orders.Status = 'rated') AND orders.userID = $id;
");


$cat = mysqli_query($con,"SELECT * FROM category");
$prod = mysqli_query($con,"SELECT product.productID, product.productImage, product.productName, product.productPrice ,category.categoryName from product join category on category.categoryID = product.categoryID");
$usr = mysqli_query($con,"SELECT * FROM users WHERE roles = 2");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cyber +</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/icons/favicon-32x32.png">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
</head>