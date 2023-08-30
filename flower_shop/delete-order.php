<?php 
session_start();
 
$productID = $_GET["productID"];

unset($_SESSION["order"][$productID]);

echo "<script>alert('Product deleted from cart');</script>"; 
echo "<script>location= 'cart.php'</script>";


?>