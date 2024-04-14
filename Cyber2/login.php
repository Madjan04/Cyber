
<?php include "control.php"?><!DOCTYPE html>
<html>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
  <link rel="stylesheet" href="assets/css/login.css">
  <link rel="stylesheet" href="assets/css/reg.css">
  <title>Login</title>
  </head>

 


<body>

<div class="login-container">

  <form class="login-form" method="POST" action="login.php">
  
    <a class="login-exit" href="index.php">×</a>
    <div class="col">

    </div>

    <div class="login-inner-container">
    
      <div class="col-sm-6">
      <?php
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
      </div>
      <div class="col">
        <label for="username">Email:</label>
        <input class="form-control" id="login-username" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
        
      </div>

      <div class="col">
        <label for="password">Password:</label>
        <input class="form-control" id="login-password" type="password" name="password" placeholder="Password" required>
       <br><br>
      </div>

      <div class = "col">
      <input class="form-control button" type="submit" name="login" id="login" value="Login">
      </div>

      <div class="col">
        <a class="forgot-btn" href="#" onclick="">Forgot account?</a>
      </div>
      <div class="col">

        Don't have an account? <a class="register-btn" href="#" onclick=show_register()>Register now!</a>
      </div>
    </div>
   
  </form>
    <form class = "reg-form display-1" id = "reg_form" action="login.php" method="POST" autocomplete="off">  
      <div class = "col">
      <a class = "register-exit" href = "#" onclick = "hide_register()">×</a>
    </div>
      <div class = "col">
        <div class="reg-inner-container">  

          <div class = "col">
            <h1>SIGN UP FORM</h1> 
          </div>

          <div class = "col">
            <label for="email">Email</label>  
            <input class="form-control" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>" style = "width:100%;">
            </div>
      
          <div class = "col">
            <label>Password</label>  
            <input class="form-control" type="password" name="password" placeholder="Password" required style = "width:100%;"> 
          </div>

          <div class = "col">
            <label>Password</label>  
            <input class="form-control" type="password" name="cpassword" placeholder="Password" required style = "width:100%;"> 
          </div>

          <div class = "col mt-5" style = "padding-top:20px;"> 
          <input class="form-control button"  id="register"  type="submit" name="signup" value="Signup" style = "width:100%;">
          </div>
        </div>

      
    </form>  
    </div>
    <script src = "assets/js/login.js"></script>
  </body> 

</html>

