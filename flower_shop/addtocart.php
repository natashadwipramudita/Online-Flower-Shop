<?php
session_start();

$productID = $_GET['productID'];

if (isset($_SESSION['order'][$productID])) {
    $_SESSION['order'][$productID] += 1;
} else {
    $_SESSION['order'][$productID] = 1;
}

echo "<script>alert('The product has been added to the cart');</script>";
echo "<script>location= 'cart.php'</script>";

?>