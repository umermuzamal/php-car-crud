<?php 


 session_start();
include "connection.php";


 
if(isset($_POST['signin'])){
    
    $uname=$_POST['name'];
    $password=$_POST['password'];

   $query="SELECT * FROM `users` where name='$uname' AND password='$password' ";
    
    
    
    $query_result =mysqli_query($conn, $query);

    if (!$query_result) {
  die("Database query failed: " );

}
    $rows = mysqli_num_rows($query_result);
    
    if($rows == 1){
        header("Location:wellcome.php");
    }
    else{

        $_SESSION['invalid'] = true;

       header('location:loginview.php');
        

    }

    mysqli_close($conn);
        
}
?>