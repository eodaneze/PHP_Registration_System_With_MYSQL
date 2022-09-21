<?php 
   require('./connection.php');

   if(isset($_GET['deleteid'])){
       $id = $_GET['deleteid'];

       $query = "delete from crud where id=$id";
       $result = mysqli_query($con, $query);

       if($result){
            header("location:../public/display.php ") ; 
       }else{
           die(mysqli_error(($con)));
       }
   }


?>
