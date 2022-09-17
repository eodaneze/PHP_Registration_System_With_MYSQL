<?php 
   session_start();
   require('../includes/connection.php');
   require('../includes/function.php');
   $user_data = check_login($con);

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
                <a href="" class="active">Home</a>
                <a href="">About</a>
                <a href="">Contact</a>
                <a href="../includes/logout.php">Logout</a>
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

    <div class="text-center border p-5 container shadow">
        <div class="row">
            <div class="col-lg-8">
                <h1>This is the home page</h1>
                <h5>Welcome, <?= $user_data['name'] ?></h5>
                <h5>Your registered email is: <?= $user_data['email'] ?></h5>
            </div>
            <div class="col-lg-4">
                <a href="user.php" class="btn btn-dark text-white">Add User</a>
            </div>
        </div>
    </div>


    <script src="../assets/js/index.js"></script>