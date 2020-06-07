<?php
session_start();
include "connection.php" ;

$id=$_GET['d_id'];

$query = " DELETE FROM `products` WHERE id='$id' ";


$query_result=mysqli_query($conn, $query);


if($query_result)
{

	 $_SESSION['delete_result']=true;
	header('location:view.php');

}
else
{
	echo "some error occured while deleting the file...";
}

?>