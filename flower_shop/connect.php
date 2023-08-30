<?php

    $con = new mysqli("localhost","root","","tagudini_natnat_flower_shop");

    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    $con->set_charset("utf8");

?>