<?php
session_start();
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
include_once "connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>

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
            background: linear-gradient(to right, #fc6767, #ec008c);
            color: #fff;
        }


        .btn-funky-moon {
            background: linear-gradient(145deg, #FDB99B, #CF8BF3, #A770EF);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 13px;
            letter-spacing: 3px;
            font-weight: bold;
            margin-top: none;
            margin-bottom: none;
        }

        .btn-funky-moon:hover {
            background: none;
            color: #A770EF;
            border: 1px solid #A770EF;
        }

        .addProduct {
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(0deg, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.2)), url(https://wallpaperaccess.com/full/381964.jpg) no-repeat;
            background-position: center;
            background-size: cover;
            padding-top: 17rem;
            padding-bottom: 10rem;
        }

        .addProduct .content {
            text-align: center;
            width: 60rem;
        }

        .addProduct .content h3 {
            color: whitesmoke;
            font-size: 3rem;
            text-shadow: 3px 3px 5px var(--black);
        }

        .addProduct .content h3 span {
            color: whitesmoke;
            text-shadow: 3px 3px 5px black;
        }

        .addProduct .content p {
            color: var(--black);
            font-size: 2rem;
            padding: 1rem 0;
            line-height: 1.8;
            font-weight: bolder;
            text-shadow: 1px 1px 1px whitesmoke;
        }

        * {
            font-family: 'Poppins', sans-serif;
        }

        .form {
            background-color: #fefefe;
            margin: 5% auto 5% auto;
            width: 95%;
            max-width: 500px;
            padding: 20px;
            box-shadow: 0 0 3px 0 gray;
        }

        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
            position: relative;
        }

        img.avatar {
            width: 30%;
            border-style: ridge;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }
    </style>
</head>

<body>

    <!-- header section starts  -->

    <header class="header">
        <a href="dashboard.php" class="logo"> <img src="https://cdn-icons-png.flaticon.com/512/7194/7194199.png"
                alt="logo" style="width: 4%;"> Natnat Fleuriste </a>

        <nav class="navbar">
            <a href="dashboard.php">Home</a>
            <a href="category.php">Category</a>
            <a href="products.php">Products</a>
            <a href="cart.php">Cart</a>
            <a href="customer.php">Customer</a>
        </nav>

        <div class="icons">
            <div class="fas fa-bars" id="menu-btn"></div>
            <div class="fas fa-user" id="login-btn"></div>
        </div>

        <form action="" class="login-form">
            <h3>HI ADMIN!</h3>
            <a href="exit.php" onclick="logout()" class="btn btn-outline-info">Log Out</a>
        </form>

        <script>
            function logout() {
                alert("Log Out Successfully! Good Bye!");
            }
        </script>
    </header>

    <!-- header section ends -->

    <!-- addProduct section starts  -->

    <section class="addProduct" id="addProduct">

        <div class="content">
            <h3>Add <span>Products</span></h3>
            <p>Add Flower's Record Here</p>
            <a href="#manage-products" class="btn">Add Now</a>
        </div>

    </section>

    <!-- addProduct section ends -->

    <!-- manage section starts -->

    <section class="manage-products" id="manage-products" style="font-size: 15px;">
        <div class="form">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="imgcontainer">
                    <h3 style="font-weight: bolder;">RECORD FORM<br><br></h3>
                    <img src="https://cdn-icons-png.flaticon.com/512/5875/5875639.png" alt="Customer Avatar"
                        class="avatar">
                </div>
                <br>
                <div class="form-floating mb-3">
                    <select class="form-control" name="categoryID" id="categoryID" required
                        style="height:50px; font-size: 15px;">
                        <option value="">-Flower Category-</option>
                        <?php
                        $category = mysqli_query($con, "SELECT * FROM tbl_category ORDER BY categoryID DESC");
                        while ($r = mysqli_fetch_array($category)) {
                        ?>
                        <option value="<?php echo $r['categoryID'] ?>"><?php echo $r['categoryName'] ?></option>
                        <?php } ?>
                    </select>
                    <label for="categoryID">Select Category</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="productname" id="productname"
                        placeholder="Enter Product Name" required style="height:50px;font-size: 15px;">
                    <label for="productname">Enter Product Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="productdescription" id="productdescription"
                        placeholder="Enter Product Description" required style="height:50px;font-size: 15px;">
                    <label for="productdescription">Enter Product Description</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="price" id="price" placeholder="Enter Price" required
                        style="height:50px;font-size: 15px;">
                    <label for="price">Enter Price</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="productunit" name="productunit"
                        style="height:50px; font-size: 15px;">
                        <option value="">-Flower Unit-</option>
                        <option value="stalk">stalk</option>
                        <option value="bouquet">bouquet</option>
                    </select>
                    <label for="productunit">Select Unit</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Enter Quantity"
                        required style="height:50px;font-size: 15px;">
                    <label for="quantity">Enter Quantity</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="image_url" id="image_url"
                        placeholder="Enter Image URL" required style="height:50px;font-size: 15px;">
                    <label for="image_url">Enter Image URL</label>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <input type="reset" value="Reset" class="btn" style="width: 100%; letter-spacing: 3px;">
                    </div>
                    <div class="col-sm-6">
                        <input type="submit" class="col btn btn-funky-moon" style="width: 100%; font-size: 15px;">
                    </div>
                </div>
            </form>
            <?php
            include_once "connect.php";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $category = $_REQUEST['categoryID'];
                $productname = $_REQUEST['productname'];
                $productdescription = $_REQUEST['productdescription'];
                $price = $_REQUEST['price'];
                $productunit = $_REQUEST['productunit'];
                $quantity = $_REQUEST['quantity'];
                $image_url = $_REQUEST['image_url'];

                if ($category == null || $productname == null || $productdescription == null || $price == null || $productunit == null || $quantity == null || $image_url == null) {

                } else {
                    $sql = "INSERT INTO `product` (`productID`, `categoryID`, `productname`, `productdescription`, `price`, `productunit`, `quantity`, `image_url`) VALUES 
                    (NULL, 
                    '$category', 
                    '$productname', 
                    '$productdescription', 
                    '$price', 
                    '$productunit', 
                    '$quantity', 
                    '$image_url'
                );";
                    $insert = mysqli_query($con, $sql);

                    if ($insert) {
                        echo '<script>alert("Added Successfully!")</script>';
                        echo '<script>window.location="products.php"</script>';
                    } else {
                        echo 'Fail to Add Record' . mysqli_error($con);
                    }
                }
            }
            ?>
        </div>
    </section>

    <!-- manage section ends -->

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
                <a href="dashboard.php" class="links"> <i class="fas fa-arrow-right"></i> Home </a>
                <a href="category.php" class="links"> <i class="fas fa-arrow-right"></i> Category </a>
                <a href="products.php" class="links"> <i class="fas fa-arrow-right"></i> Products </a>
                <a href="cart.php" class="links"> <i class="fas fa-arrow-right"></i> Cart </a>
                <a href="customer.php" class="links"> <i class="fas fa-arrow-right"></i> Customer </a>
            </div>

        </div>

        <div class="credit"> Submitted by : <span> Natasha Dwi Pramudita </span> | &copy; All Rights Reserved 2022
            <br> Submitted to : <span> Jim-Mar de Los Reyes </span> | Instructor
        </div>
    </section>

    <!-- footer section ends -->

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="script.js"></script>

</body>

</html>