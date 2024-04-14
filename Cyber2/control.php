<?php 
session_start();
error_reporting(0);
require "connection.php";
$email = "";
$name = "";
$errors = array();

            if(isset($_POST['signup'])){
                $email = mysqli_real_escape_string($con, $_POST['email']);
                $password = mysqli_real_escape_string($con, $_POST['password']);
                $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
                if($password !== $cpassword){
                    $errors['password'] = "Confirm password not matched!";
                }
                $email_check = "SELECT * FROM users WHERE email = '$email'";
                $res = mysqli_query($con, $email_check);
                if(mysqli_num_rows($res) > 0){
                    $errors['email'] = "Email that you have entered is already exist!";
                }
                
                if(count($errors) === 0){
                    $encpass = password_hash($password, PASSWORD_BCRYPT);
                    $code = 0;
                    $status = "verified";
                    $insert_data = "INSERT INTO users ( email, password, code, status) values('$email', '$encpass', '$code', '$status')";
                    $data_check = mysqli_query($con, $insert_data);
                    if($data_check){
                        echo "<script>alert('Account Created Successfully');window.location.href='index.php'</script>";
                    }else{
                        $errors['db-error'] = "Failed while inserting data into database!";
                    }
                }

            }
                
                if(isset($_POST['login'])){
                    $email = mysqli_real_escape_string($con, $_POST['email']);
                    $password = mysqli_real_escape_string($con, $_POST['password']);
                    $check_email = "SELECT * FROM users WHERE email = '$email'";
                    $res = mysqli_query($con, $check_email);
                    if(mysqli_num_rows($res) > 0){
                        $fetch = mysqli_fetch_assoc($res);
                        $fetch_pass = $fetch['password'];
                        if(password_verify($password, $fetch_pass)){
                            $_SESSION['email'] = $email;
                            $status = $fetch['status'];
                            if($status == 'verified'){
                            $_SESSION['email'] = $email;
                            $_SESSION['password'] = $password;
                            $roles = $fetch['roles'];
                            if($roles == 1){
                                header('location: ./admin/index.php');
                            }else{
                                header('location: ./user/index.php');
                            }
                                
                            }else{
                                $info = "It's look like you haven't still verify your email - $email";
                                $_SESSION['info'] = $info;
                                header('location: user-otp.php');
                            }
                        }else{
                            $errors['email'] = "Incorrect email or password!";
                        }
                    }else{
                        $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
                    }
                }
                



        //</Querriesss> ---------------------------------------------------------------------------------------------------


        $prod = mysqli_query($con,"SELECT product.productID, product.productImage, product.productName, product.productPrice ,category.categoryName from product join category on category.categoryID = product.categoryID");



    
?>