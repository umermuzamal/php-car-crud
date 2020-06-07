<?php

session_start(); 
if(isset($_POST['add']))
{

$id= $_POST['id'];
$name= $_POST['name'];
$price= $_POST['price'];
$code= $_POST['code'];
$instock= $_POST['instock'];
$discount= $_POST['discount'];
$size= $_POST['size'];
$details= $_POST['details'];

$photo_info =$_FILES['photo'];
$photo_name =$photo_info['name'];
$photo_tmp_name =$photo_info['tmp_name'];


$folder ="productsphoto/";
$full_path =$folder . $photo_name;

move_uploaded_file($photo_info['tmp_name'], $full_path);

include "connection.php";

$query ="INSERT INTO `products`(`id`, `name`, `price`, `code`, `instock`, `discount`, `size`, `details`, `photo`) VALUES ('$id','$name','$price','$code','$instock','$discount','$size','$details','$full_path' ) ";

$query_result =mysqli_query($conn, $query);
if (!$query_result) {
  die("Database query failed: " );

}
 
  mysqli_close($conn);



     if($query_result){
  $_SESSION['insert_result'] =true;
  
  header('location:insertview.php');
}
  else
  {
    echo "the query is not executed sucessfully";
  }

}

  ?>