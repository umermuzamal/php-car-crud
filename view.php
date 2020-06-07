

    <?php
  session_start();
  include "connection.php";
  $query="SELECT * FROM `products` ";
  $query_result =mysqli_query($conn, $query);
if (!$query_result) {
  die("Database query failed: " );

}

  mysqli_close($conn);

  
  ?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>View</title>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

 </head>

<body>

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link "  href="wellcome.php" >Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="insertview.php" >Add Product</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="view.php" >View Products</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="loginview.php">Log Out</a>
  </li>
</ul>


<?php

     if(isset($_SESSION['update_result']) and ($_SESSION['update_result'] )== true)
   {
    echo "<h2>Record update successfully</h2>";
    $_SESSION['update_result']=false;

   }

   if(isset($_SESSION['delete_result']) and $_SESSION['delete_result'] == true)
   {
    echo "<h2>Record Deleted successfully</h2>";
    $_SESSION['delete_result']=false;

   }
    
    ?>



    <table border="1" class="table table-bordered ">
  <thead>
  <tr>

  <th>Id</th>
  <th>Name</th>
  <th>Price</th>
  <th>Code</th>
  <th>Instock</th>
   <th>Discount</th>
  <th>Size</th>
  
  <th>Image</th>
  <th>Product Details</th>
  <th colspan="2">Opertion</th>
  

  </tr>


</thead>

<tbody>
  
  <?php 
  
  while($res=mysqli_fetch_array($query_result))
  {

  ?> 

  <tr>
    
     
         <td> <?php echo $res['id'] ?> </td>
         <td> <?php echo $res['name'] ?> </td>
         <td> <?php echo $res['price'] ?> </td>
         <td> <?php echo $res['code'] ?> </td>
         <td> <?php echo $res['instock'] ?> </td>
         <td> <?php echo $res['discount'] ?> </td>
         <td> <?php echo $res['size'] ?> </td>
              <td> <img src="<?php echo $res['photo'] ?>" width=50% height=50% > </td>
         <td> <?php echo $res['details'] ?> </td>
    
         <td> <a href="update.php?u_id= <?php echo $res['id'] ?>">Update </a> </td>
         <td> <a href="delete.php?d_id= <?php echo $res['id'] ?>">Delete </a> </td>
         
  </tr>

  <?php
}

?>
</tbody>
</table>


  </body>

</html>
