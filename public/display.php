<?php 
  require('../includes/connection.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/css/index.css" />
    <link rel="stylesheet" href="../assets/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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


    <div class="container mt-5 shadow p-4 border">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">S/NO</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Password</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>

                <?php 
           $query = 'select * from crud';
           $result = mysqli_query($con, $query);

         
           while($row = mysqli_fetch_assoc($result)){
                $id = $row['id'];
                $name = $row['name'];
                $email = $row['email'];
                $mobile = $row['mobile'];
                $password = $row['password'];

                echo '
                <tr>
                <th scope="row">'.$id.'</th>
                <td>'.$name.'</td>
                <td>'.$email.'</td>
                <td>'.$mobile.'</td>
                <td>'.$password.'</td>
                <td>
                <button class="btn btn-dark"><a href="../includes/update.php?updateid='.$id.'" class="text-white text-decoration-none"><i class="fa fa-edit"></i>   Update</a></button>
                <button class="btn btn-danger"><a href="../includes/delete.php?deleteid='.$id.'" class="text-white text-decoration-none"><i class="fa fa-trash"></i> Delete</a></button>
                </td>
            </tr>
                ';
           }
        
        ?>
           

            </tbody>
        </table>
    </div>
    <script src="../assets/js/index.js"></script>