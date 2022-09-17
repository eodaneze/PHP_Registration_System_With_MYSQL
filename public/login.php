<?php 
   session_start();
   require('../includes/connection.php');
   require('../includes/function.php');


   if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $email = $_POST['email'];
      $password = md5($_POST['password']);

      if(empty($email)){
        header('location:login.php?error=email field is required');
        exit();
      }
      elseif(empty($password)){
        header('location:signup.php?error=password field is required');
        exit();
      }
      else{
           $query = "select * from user where email = '$email' and password = '$password'";
           $result = mysqli_query($con,$query);
          if(mysqli_num_rows($result) > 0){
            $user_data = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $user_data['user_id'];
            header('location:index.php?success=you have logged in successfully!!');
            return false;
          }else{
            header('location:login.php?error=email or password is inccorect');
            exit();
          }
      }
   }

  

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/css/index.css" />
    <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css" />
    <title>Document</title>
  </head>
  <body>
    <div class="all-nav shadow mb-3">
      <div class="nav-content container">
        <div class="nav-logo">
          <h1>PHP_CLASS</h1>
        </div>
        <div class="nav-right">
          <a href="">Home</a>
          <a href="">About</a>
          <a href="">Contact</a>
          <a href="" class="active">Login</a>
          <a href="">Register</a>
        </div>
      </div>
    </div>
     
    

    <?php 
        if(isset($_GET['success'])){
             ?>
                <div class="alert alert-success container text-center"><?= $_GET['success'] ?></div>
             <?php
        }
    
    ?>
    
    <div class="all-container">
      <div class="content container-main">
          <div class="form-right">
               <img src="../assets/img/register.png" alt="" />
             </div>
        <div class="form-left shadow p-4 mb-5">
          <h5>Login</h5>
          <div class="message text-center">
              <p class="error"></p>
          </div>
          <form action="" method="post">
            
            <div>
              <input type="email" name="email" placeholder="Enter email" />
            </div>
            <div>
              <input
                type="password"
                name="password"
                placeholder="Enter password" id="myInput"
              />
            </div>
           
             <div class="submit_btn">
               <input type="submit" value="Login" class="bg-primary text-white fw-bold">
            </div>
            <input type="checkbox" onclick="myFunction()">Show Password
            <div class="text-center mt-4">
                 <p class="small">Don't have an account? <a href="signup.php">Register</a></p>
            </div>
          </form>
        </div>
        
      </div>
    </div>
    
    <div class="all-footer">
     <div class="text-center text-white p-3">
           <h5>Developed by Dancode &copy; 2022</h5>
     </div>
</div>

    <script src="../assets/js/index.js"></script>
  </body>
</html>
