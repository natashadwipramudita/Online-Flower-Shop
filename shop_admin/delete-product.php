<?php
include_once "connect.php";
$id=$_GET['id'];


 $sql = "DELETE FROM product WHERE productID = $id";


	if ($con->query($sql) === TRUE) {
	  echo '<script>alert("Record has been deleted.")</script>';
	  echo '<script>window.location="products.php"</script>';
	} else {
	  echo "Error: " . $sql . "<br>" . $con->error;
	}

?>
