<?php
session_start();
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
?>

<?php 
if(empty($_SESSION["order"]) OR !isset($_SESSION["order"]))
{
  echo "<script>alert('Cart empty, choose product first');</script>";
  echo "<script>location= 'products.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product | Natnat Fleuriste</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <link rel="stylesheet" href="style.css">

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        .btn {
            margin-top: 16px;
            display: inline-block;
            padding: 10px 25px;
            font-size: 15px;
            border-radius: 8px;
            border: 1px solid #130f40;
            color: #130f40;
            cursor: pointer;
            background: none;
        }

        .btn:hover {
            background: #2193b0;
            color: #fff;
        }

        .btnbuy {
            margin-top: 0;
            display: inline-block;
            padding: 10px 25px;
            font-size: 15px;
            border-radius: 8px;
            border: 1px solid #130f40;
            color: #130f40;
            cursor: pointer;
            background: none;
        }

        .btnbuy:hover {
            background: linear-gradient(to right, #fc6767, #ec008c);
            color: #fff;
        }
    </style>

    <script>
        function funcsearch() {
            var input, filter, ul, li, h4, i, txtValue;
            input = document.getElementById("myinput");
            filter = input.value.toUpperCase();
            ul = document.getElementById("myList");
            li = ul.getElementsByClassName('card');

            //loop
            for (i = 0; i < li.length; i++) {
                h4 = li[i].getElementsByClassName("card-title")[0];
                txtValue = h4.textContent || h4.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        }
    </script>
</head>

<body>

    <!-- header section starts  -->

    <header class="header">
        <a href="home.php" class="logo"> <img src="https://cdn-icons-png.flaticon.com/512/7194/7194199.png" alt="logo"
                style="width: 4%;"> Natnat Fleuriste </a>

        <nav class="navbar">
            <a href="home.php">Home</a>
            <a href="category.php">Category</a>
            <a href="products.php">Products</a>
            <a href="aboutus.php">About Us</a>
        </nav>

        <div class="icons">
            <div class="fas fa-bars" id="menu-btn"></div>
            <div class="fas fa-search" id="search-btn"></div>
            <div class="fas fa-shopping-cart" id="cart-btn"></div>
            <div class="fas fa-user" id="login-btn"></div>
        </div>

        <form action="" class="search-form">
            <input type="search" id="search-box" placeholder="search only for category and product" disabled>
            <label for="search-box" class="fas fa-search"></label>
        </form>

        <form action="" class="login-form">
            <h3>HI CUSTOMER!</h3>
            <a href="exit.php" onclick="logout()" class="btn btn-outline-info">Log Out</a>
        </form>

        <div class="shopping-cart">
            <a href="cart.php" class="btn btn-outline-info">View Cart</a>
        </div>

        <script>
            function logout() {
                alert("Log Out Successfully! Good Bye!");
            }
        </script>
    </header>

    <!-- header section ends -->

    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="content">
            <h3>Welcome <span>Customer</span></h3>
            <p>See Your Cart Here</p>
            <a href="#category" class="btn">See Now</a>
        </div>

    </section>

    <!-- home section ends -->

    <!-- category section starts  -->

    <section class="category" id="category" name="category">

        <h1 class="heading"> Customer <span>Cart</span> </h1>

        <table class="table table-bordered" id="example" style="font-size: 15px;">
            <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total Price</th>
                    <th scope="col" widh="30px">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor = 1; ?>
                <?php $totalbuy = 0; ?>
                <?php foreach ($_SESSION["order"] as $productID => $quantity): ?>

                <?php
                    include('connect.php');
                    $ambil = mysqli_query($con, "SELECT * FROM product WHERE productID='$productID'");
                    $pecah = $ambil->fetch_assoc();
                    $total = $pecah["price"] * $quantity;
                ?>
                <tr>
                    <td><?php echo $nomor; ?></td>
                    <td><?php echo $pecah["productname"]; ?></td>
                    <td>IDR <?php echo number_format($pecah["price"]); ?></td>
                    <td><?php echo $quantity; ?></td>
                    <td>IDR <?php echo number_format($total); ?></td>
                    <td>
                        <a href="delete-order.php?productID=<?php echo $productID ?>" class="btnbuy" style="text-decoration: none;">Delete</a>
                    </td>
                </tr>
                <?php $nomor++; ?>
                <?php $totalbuy += $total; ?>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4">Total Order</th>
                    <th colspan="2">Rp. <?php echo number_format($totalbuy) ?></th>
                </tr>
            </tfoot>
        </table><br>
        <form method="POST" action="">
            <a href="products.php" class="btn btn-primary btn-sm">See Product</a>
            <button class="btn btn-primary btn-sm" name="confirm">Confirm Order</button>
        </form>

        <?php
        if (isset($_POST['confirm'])) {
            $dateOrder = date("Y-m-d");

            $insert = mysqli_query($con, "INSERT INTO `order` (`orderID`, `dateOrder`, `total`) VALUES (NULL, '$dateOrder', '$totalbuy')");

            $id_new = $con->insert_id;

            foreach ($_SESSION["order"] as $productID => $quantity) {
                $insert = mysqli_query($con, "INSERT INTO order_product (orderID, productID, quantity) 
              VALUES ('$id_new', '$productID', '$quantity') ");
            }

            unset($_SESSION["order"]);

            echo "<script>alert('Order Successfully!');</script>";
            echo "<script>location= 'products.php'</script>";
        }
        ?>
    </section>

    <!-- category section ends -->

    <!-- footer section starts  -->

    <section class="footer">
        <h1>
            <hr>
        </h1>
        <div class="box-container">

            <div class="box">
                <h3> Natnat Fleuriste <img src="https://cdn-icons-png.flaticon.com/512/7194/7194199.png" alt="logo"
                        style="width: 7%;"> </h3>
                <p>EXPLORE MORE</p>
                <div class="share">
                    <a href="https://web.facebook.com/natasha.dwipramudita" class="fab fa-facebook-f"
                        style="text-decoration: none;"></a>
                    <a href="https://twitter.com/natnatyuhuuu" class="fab fa-twitter"
                        style="text-decoration: none;"></a>
                    <a href="https://www.instagram.com/natnatyuhuuu/" class="fab fa-instagram"
                        style="text-decoration: none;"></a>
                    <a href="https://www.linkedin.com/in/natasha-dwi-pramudita-31121717a/" class="fab fa-linkedin"
                        style="text-decoration: none;"></a>
                </div>
            </div>

            <div class="box">
                <h3>Contact Info</h3>
                <a href="https://api.whatsapp.com/send?phone=62895366996023" class="links"> <i class="fas fa-phone"></i>
                    +62895-3669-96023 </a>
                <a href="mailto:2141720147@student.polinema.ac.id" class="links"> <i class="fas fa-envelope"></i>
                    2141720147@student.polinema.ac.id </a>
                <a href="https://goo.gl/maps/sAvr8yC37m2Hsh2T6" class="links"> <i class="fas fa-map-marker-alt"></i>
                    Malang, Indonesia - 65154 </a>
            </div>

            <div class="box">
                <h3>Quick Links</h3>
                <a href="home.php" class="links"> <i class="fas fa-arrow-right"></i> Home </a>
                <a href="category.php" class="links"> <i class="fas fa-arrow-right"></i> Category </a>
                <a href="products.php" class="links"> <i class="fas fa-arrow-right"></i> Products </a>
                <a href="aboutus.php" class="links"> <i class="fas fa-arrow-right"></i> About Us </a>
            </div>

        </div>

        <div class="credit"> Submitted by : <span> Natasha Dwi Pramudita </span> | &copy; All Rights Reserved 2022
            <br> Submitted to : <span> Jim-Mar de Los Reyes </span> | Instructor
        </div>
    </section>

    <!-- footer section ends -->

    <script src="script.js"></script>

</body>

</html>