<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Add</title>

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
   <h1>Add Details</h1>
    <?php

    if (isset($_SESSION['insert_result']) and $_SESSION['insert_result'] == true)
   {
    echo "<p>Record inserted successfully</p>";
    $_SESSION['insert_result'] = false;

   }


?>  
       
  <form action="insertphp.php" method="POST" enctype="multipart/form-data">

  <div class="row">

    <div class="col-75">
      <input type="number" name="id" placeholder="Product id*">
    </div>
  </div>



  <div class="row">



    <div class="col-75">
      <input type="text" name="name" placeholder="Product name*">
    </div>
  </div>
  <div class="row">



    <div class="col-75">
      <input type="number"  name="price" placeholder="Product price*">
    </div>
  </div>
  <div class="row">
    
    <div class="col-75">
      <input type="text" name="code" placeholder="Product code*">
    </div>
  </div>
  <div class="row">
    
    <div class="col-75">
      <select name="instock" >
        <option value="Y">Y</option>
        <option value="N">N</option>
        
        
      </select>
    </div>
  </div>

<div class="row">
    
    <div class="col-75">
      <input type="text"  name="discount" placeholder="Product discount*">
    </div>
  </div>
  <div class="row">
    
    <div class="col-75">
      <select  name="size">
        <option value="SMALL">SMALL</option>
        <option value="MEDIUM">MEDIUM</option>
        <option value="LARGE">LARGE</option>
      </select>
    </div>
  </div>
  <div class="row">
    
    <div class="col-75">
      <textarea  name="details" placeholder="Product details*" style="height:100px"></textarea>
    </div>
  </div>

<div class="row">
    
    <div class="col-75">
      <input type="file"  name="photo" >
    </div>
  </div>

  <div class="row">
    <input type="submit" name= "add" value="Add">
  </div>
  </form>
</div>



       
 

  </body>

</html>
