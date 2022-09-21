<?php 
    
   require('./connection.php');
   $id = $_GET['updateid'];
    


   $query = "select * from crud where id=$id";
   $result = mysqli_query($con, $query);
   $row = mysqli_fetch_assoc($result);
   $name = $row['name'];
   $email = $row['email'];
   $mobile = $row['mobile'];
   $password = $row['password'];
   

   if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $query = "update crud set id=$id,name='$name',email='$email',mobile='$mobile',password='$password'";
    $result = mysqli_query($con,$query);

    if($result){
         header("Location: display.php");
    }else{
        die(mysqli_error($con));
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
                <a href="" class="active">Home</a>
                <a href="">About</a>
                <a href="">Contact</a>
                <a href="../includes/logout.php">Logout</a>
            </div>
        </div>
    </div>




<div class="container my-5 shadow p-4">
    <form method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="name" class="form-control" placeholder="Enter Your Name" name="name"  value="<?= $name ?>">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" placeholder="Enter Your Email" name="email" >
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Mobile</label>
            <input type="text" class="form-control" placeholder="Enter Mobile" name="mobile">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Password</label>
            <input type="text" class="form-control" placeholder="Enter Password" name="password" >
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>
</div>