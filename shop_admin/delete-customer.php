<?php
    include 'connect.php';

    if (isset($_GET['id'])) {
        $delete = mysqli_query($con, "DELETE FROM tbl_customer WHERE customerID = '".$_GET['id']."' ");
        echo '<script>window.location="customer.php"</script>';
    }
?>