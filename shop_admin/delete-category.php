<?php
    include 'connect.php';

    if (isset($_GET['idc'])) {
        $delete = mysqli_query($con, "DELETE FROM tbl_category WHERE categoryID = '".$_GET['idc']."' ");
        echo '<script>window.location="category.php"</script>';
    }
?>