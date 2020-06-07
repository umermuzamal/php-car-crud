
<?php 
session_start();


include "connection.php";
$uid=$_GET['u_id'];
  $query="SELECT * FROM `products` WHERE id='$uid' ";
  $query_result =mysqli_query($conn, $query);
if (!$query_result) {
  die("Database query failed: " );

}
$res=mysqli_fetch_array($query_result);


 

if(isset($_POST['update']))
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
if($folder==$full_path)
{
   $full_path = $res['photo'];
}
else
{
move_uploaded_file($photo_info['tmp_name'], $full_path);
}


  $query= "UPDATE `products`  SET `id`='$id',`name`='$name',`price`='$price',`code`='$code',`instock`='$instock',`discount`='$discount',`size`='$size',`details`='$details',`photo`='$full_path' WHERE id='$uid' ";
  $query_result= mysqli_query($conn, $query);
  if($query_result){
  $_SESSION['update_result'] =true;
  header('location:view.php');

  }
  else
  {
  echo "some error occured while updating the file...";

  }
}

 mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Update</title>

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


  <style>
* {
  box-sizing: border-box;
}

input[type=text],  select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}
input[type=number] {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}



label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>

 </head>

<body>

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link "  href="wellcome.php" >Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="insert.php" >Add Product</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="view.php" >View Products</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="loginview.php">Log Out</a>
  </li>
</ul>


<div class="container">
   <h1>Update Details</h1>
    
       
  <form action="" method="POST" enctype="multipart/form-data">

  <div class="row">

    <div class="col-75">
      <input type="number" name="id" value="<?php echo $res['id'] ?>">
    </div>
  </div>



  <div class="row">



    <div class="col-75">
      <input type="text" name="name" value="<?php echo $res['name'] ?>">
    </div>
  </div>
  <div class="row">



    <div class="col-75">
      <input type="number"  name="price" value="<?php echo $res['price'] ?>">
    </div>
  </div>
  <div class="row">
    
    <div class="col-75">
      <input type="text" name="code" value="<?php echo $res['code'] ?>">
    </div>
  </div>
  <div class="row">
    
    <div class="col-75">
      <?php
          $instocksel= $res['instock'];
          ?>
      <select name="instock" >
        
        <option <?php if($instocksel == 'Y'){echo ("selected");}?> value="Y">Y</option>
            <option <?php if($instocksel == 'N'){echo ("selected");}?> value="N">N</option>
        
        
      </select>
    </div>
  </div>

<div class="row">
    
    <div class="col-75">
      <input type="text"  name="discount" value="<?php echo $res['discount'] ?>">
    </div>
  </div>
  <div class="row">
    
    <div class="col-75">
        <?php
          $sizesel= $res['size'];
          ?>
      <select  name="size">
       
          <option <?php if($sizesel == 'SMALL'){echo ("selected");}?> value="SMALL">SMALL</option>
            <option <?php if($sizesel == 'MEDIUM'){echo ("selected");}?> value="MEDIUM">MEDIUM</option>
            <option <?php if($sizesel == 'LARGE'){echo ("selected");}?> value="LARGE">LARGE</option>
      </select>
    </div>
  </div>
  <div class="row">
    
    <div class="col-75">
      <textarea  name="details"  style="height:100px"> <?php echo $res['details'] ?> </textarea>
    </div>
  </div>

<div class="row">
    
    <div class="col-75">
      <input type="file"  name="photo" >
       <br>
          <img src="<?php echo $res['photo'] ?>">
    </div>
  </div>

  <div class="row">
    <input type="submit" name= "update" value="Update">
  </div>
  </form>
</div>



       
 

  </body>

</html>
