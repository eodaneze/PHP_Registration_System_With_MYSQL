<?php 
session_start();
require('../includes/connection.php');
require('../includes/function.php');
 


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $conpassword = $_POST['conpassword'];

    if(empty($name)){
        header('location:signup.php?error=name field is required');
        exit();
    }elseif(empty($email)){
        header('location:signup.php?error=Email field is required');
        exit();
    }
    elseif($password !== $conpassword){
        header('location:signup.php?error=password mismatch!!');
        exit();
    }
    elseif(strlen($password) < 8){
        header('location:signup.php?error=password must contain at least 8 characters');
        exit();
    }elseif(! preg_match("/[a-z]/i" , $password)){
        header('location:signup.php?error=password must contain at least 1 character');
        exit();
    }elseif(! preg_match("/[0-9]/",$password)){
        header('location:signup.php?error=password must contain at least 1 number');
        exit();
    }elseif(! filter_var($email, FILTER_VALIDATE_EMAIL)){
        header('location:signup.php?error=invalid email');
        exit();
    }else{
        $user_id = random_num(20);
        $query = "insert into user (name,email,user_id,password) values('$name','$email','$user_id','$password')";

        mysqli_query($con,$query);

        header('location:login.php?success=Your registration was successful you can now login with your details');
        die();
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
    <div class="all-nav shadow mb-5">
        <div class="nav-content container">
            <div class="nav-logo">
                <h1>PHP_CLASS</h1>
            </div>
            <div class="nav-right">
                <a href="">Home</a>
                <a href="">About</a>
                <a href="">Contact</a>
                <a href="">Login</a>
                <a href="" class="active">Register</a>
            </div>
        </div>
    </div>
    

    <div class="all-container">
        <div class="content container-main">
            <div class="form-left shadow p-4 mb-5">
                <h5>Register</h5>
                <div class="message text-center">
                    <?php 
                       if(isset($_GET['error'])){
                           ?>
                              <div class="error"><?= $_GET['error']?></div>

                           <?php
                       }
                    
                    ?>
                </div>
                <form method="post" novalidate>
                    <div>
                        <input type="text" name="name" placeholder="Enter name" />
                    </div>
                    <div>
                        <input type="email" name="email" placeholder="Enter email" />
                    </div>
                    <div>
                        <input type="password" name="password" placeholder="Enter password" id="myInput" />
                    </div>
                    <div>
                        <input type="password" name="conpassword" placeholder="Confirm password" />
                    </div>
                    <div class="submit_btn">
                        <input type="submit" value="Register" class="bg-primary text-white fw-bold">
                    </div>
                    <input type="checkbox" onclick="myFunction()">Show Password
                    <div class="text-center mt-4">
                        <p>Alrady have an account? <a href="login.php">Login</a></p>
                    </div>
                </form>
            </div>
            <div class="form-right">
                <img src="../assets/img/register.png" alt="" />
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