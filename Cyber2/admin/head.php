

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
            $title = "Admin";
        }
        if($roles == 2){
            header('Location: ../user/index.php');
        }
    }
}else{
    header('Location: ../login.php');
}

if(isset($_POST['profile'])){
    $fname = $_POST['first'];
    $lname = $_POST['last'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $update = mysqli_query($con, "UPDATE users SET first_name= '$fname', last_name= '$lname', email= '$email', contact= '$number', address= '$address' WHERE userID = $id");
    if($update){
        echo "<script>alert('Update Profile Successfully');window.location.href='profile.php'</script>";
    }else{
        echo "<script>alert('Update Profile not Successful');window.location.href='profile.php'</script>";
    }
}

if(isset($_GET['editcat'])){
    $editcat = $_GET['editcat'];
    $catspc = mysqli_query($con,"SELECT * FROM category WHERE categoryID = $editcat");
    $details = mysqli_fetch_assoc($catspc);
}
if(isset($_GET['deletecat'])){
    $deletecat = $_GET['deletecat'];
    $catspc = mysqli_query($con,"DELETE FROM category WHERE categoryID = $deletecat");
    if($catspc){
        echo "<script>alert('Deleted Succesfully');window.location.href='addcategory.php'</script>";
    }else{
        echo "<script>alert('Deleted Error');window.location.href='addcategory.php'</script>";
    }
}
if(isset($_POST['adcath'])){
    
    if(empty($_POST['catname'])){
        echo "<script>alert('No input for category name');window.location.href='addcategory.php'</script>";
    }else {
        $catname = $_POST['catname'];
    }
    if($editcat == ""){
        $insert = mysqli_query($con,"INSERT INTO category(categoryName) VALUES ('$catname')");
        if($insert){
            echo "<script>alert('Saved Succesfully');window.location.href='addcategory.php'</script>";
        }else{
            echo "<script>alert('Saved Error');window.location.href='addcategory.php'</script>";
        }
    }else {
        $updated = mysqli_query($con,"UPDATE category SET categoryName = '$catname' WHERE categoryID = $editcat");
        if($updated){
            echo "<script>alert('Updated Succesfully');window.location.href='addcategory.php'</script>";
        }else{
            echo "<script>alert('Updated Error');window.location.href='addcategory.php'</script>";
        }
    }
}


if(isset($_GET['editprod'])){
    $editprod = $_GET['editprod'];
    $proed = mysqli_query($con,"SELECT * FROM product WHERE productID = $editprod");
    $details = mysqli_fetch_assoc($proed);
}

if(isset($_GET['deleteprod'])){
    $deleteprod = $_GET['deleteprod'];
    $catspc = mysqli_query($con,"DELETE FROM product WHERE productID = $deleteprod");
    if($catspc){
        echo "<script>alert('Deleted Succesfully');window.location.href='products.php'</script>";
    }else{
        echo "<script>alert('Deleted Error');window.location.href='products.php'</script>";
    }
}
if (isset($_POST['addproduct'])) {
    
    if($_FILES['lis_img0']['name']!=''){
        $lis_img0 = $_FILES['lis_img0']['name'];
        }
        else{
          $lis_img0 = $details['productImage'];
        }
        $tempname = $_FILES['lis_img0']['tmp_name'];
        $folder = "../assets/images/game/".$lis_img0;

    if($_FILES['fileApk']['name']!=''){
            $fileApk = $_FILES['fileApk']['name'];
            }
            else{
              $fileApk = $details['files'];
            }
            $tempname1 = $_FILES['fileApk']['tmp_name'];
            $folder1 = "../assets/Apk/".$fileApk;
   
    if(empty($_POST['podname'])){
        $errors['podname'] = "No input for Product name";
        
    }else {
        $podname = $_POST['podname'];
    }

    if(empty($_POST['prize'])){
        $errors['prize'] = "No input for Prize ";
    }else {
        $prize = $_POST['prize'];
    }

    if(empty($_POST['cath'])){
        $errors['cath'] = "Please Choose Category";
       
    }else {
        $cath = $_POST['cath'];
    }

    if(count($errors) === 0){
    if ($editprod == "") {
        move_uploaded_file($tempname, $folder);
        move_uploaded_file($tempname1, $folder1);
        $insert = mysqli_query($con,"INSERT INTO product(categoryID,productName,productImage,productPrice,files)
                                VALUES ('$cath','$podname','$lis_img0','$prize', '$fileApk')");
                                if($insert){
                                    echo "<script>alert('Saved Succesfully');window.location.href='products.php'</script>";
                                }else{
                                    echo "<script>alert('Saved Error');window.location.href='products.php'</script>";
                                }
    }else {
        move_uploaded_file($tempname, $folder);
        move_uploaded_file($tempname1, $folder1);
        $update = mysqli_query($con,"UPDATE product SET categoryID = '$cath',productName = '$podname', productImage = '$lis_img0', productPrice = '$prize' , files = '$fileApk' WHERE productID = $editprod ");
                                if($update){
                                    echo "<script>alert('update Succesfully');window.location.href='addproducts.php'</script>";
                                }else{
                                    echo "<script>alert('update Error');window.location.href='addproducts.php'</script>";
                                }
    }
    }
    # code...
}

if (isset($_GET['paid'])) {
    $paid = $_GET['paid'];
    $catspc = mysqli_query($con,"UPDATE orders SET Status ='paid' WHERE ordersID = $paid");
    if($catspc){
        echo "<script>alert('Paid Succesfully');window.location.href='validating.php'</script>";
    }else{
        echo "<script>alert('Paid Error');window.location.href='validating.php'</script>";
    }
}

$cat = mysqli_query($con,"SELECT * FROM category");
$prod = mysqli_query($con,"SELECT product.productID, product.productName, product.productPrice ,category.categoryName from product join category on category.categoryID = product.categoryID");
$usr = mysqli_query($con,"SELECT * FROM users WHERE roles = 2");

$unpaidcnt = mysqli_query($con,"SELECT COUNT(Status) unpaid from orders WHERE Status = 'validating'");
$unpaidcnt = mysqli_fetch_assoc($unpaidcnt);
$unpaid = mysqli_query($con,"SELECT product.productName, product.productPrice, orders.TransactionID, orders.Status, orders.ordersID, orders.date_ordered, orders.MOP, orders.Transaction_code
FROM orders 
JOIN product ON product.productID = orders.productID 
WHERE (orders.Status = 'validating');
");

    date_default_timezone_set('Asia/Manila');
    $currentDateTime = new DateTime();
    $month = $currentDateTime->format('F');
    $today = $currentDateTime->format('F-d-Y');
    
    $salemont = mysqli_query($con,"SELECT SUM(product.productPrice) AS monthly 
    FROM product 
    JOIN orders ON orders.productID = product.productID 
    WHERE (orders.Status = 'rated' OR orders.Status = 'paid') 
    AND orders.date_ordered LIKE '%$month%';");
    $salemont = mysqli_fetch_assoc($salemont);

    $saleda = mysqli_query($con,"SELECT SUM(product.productPrice) AS daily 
    FROM product 
    JOIN orders ON orders.productID = product.productID 
    WHERE (orders.Status = 'rated' OR orders.Status = 'paid') 
    AND orders.date_ordered LIKE '%$today%';");
    $saleday = mysqli_fetch_assoc($saleda);

    $ttlsale = mysqli_query($con,"SELECT SUM(product.productPrice) AS total 
    FROM product 
    JOIN orders ON orders.productID = product.productID 
    WHERE (orders.Status = 'rated' OR orders.Status = 'paid');");
    $saletotal = mysqli_fetch_assoc($ttlsale);


    $trasn = mysqli_query($con,"SELECT orders.date_ordered, orders.TransactionID, users.first_name, users.last_name, product.productPrice ,product.productName, orders.Status , orders.Rate from orders join users on users.userID = orders.userID join product on product.productID = orders.productID");

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