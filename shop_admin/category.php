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
    <title>Manage Category</title>

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

        .btn-cool-blue {
            background: linear-gradient(to right, #6dd5ed, #2193b0);
            color: #fff;
            border: none;
            border-radius: 8px;
            width: 100%;
            font-size: 13px;
            letter-spacing: 3px;
            font-weight: bold;
            margin-top: none;
            margin-bottom: none;
        }

        .btn-cool-blue:hover {
            background: none;
            color: #2193b0;
            border: 1px solid #2193b0;
        }

        .btn-orange-moon {
            background: linear-gradient(to right, #f7b733, #fc4a1a);
            color: #fff;
            border: none;
            border-radius: 8px;
            width: 100%;
            font-size: 13px;
            letter-spacing: 3px;
            font-weight: bold;
            margin-top: none;
            margin-bottom: none;
        }

        .btn-orange-moon:hover {
            background: none;
            color: #fc4a1a;
            border: 1px solid #fc4a1a;
        }

        .btn-pink-moon {
            background: linear-gradient(to right, #fc6767, #ec008c);
            color: #fff;
            border: none;
            border-radius: 8px;
            width: 100%;
            font-size: 13px;
            letter-spacing: 1px;
            font-weight: bold;
            margin-top: none;
            margin-bottom: none;
        }

        .btn-pink-moon:hover {
            background: none;
            color: #ec008c;
            border: 1px solid #ec008c;
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

    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="content">
            <h3>Manage <span>Category</span></h3>
            <p>Manage Flower's Category Here</p>
            <a href="#manage-products" class="btn">Manage Now</a>
        </div>

    </section>

    <!-- home section ends -->

    <!-- manage section starts -->

    <section class="manage-products" id="manage-products" style="font-size: 15px;">
        <h1 class="heading"> Manage <span>Category</span> </h1>
        <!-- Content -->
        <div class="section">
            <div class="container">
                <div class="box">
                    <p><a align="center" href="add-category.php" class="col btn btn-cool-blue">ADD CATEGORY</a></p>
                    <h6><br><br></h6>
                    <table border="1" cellspacing="0" class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th width="60px">CategoryID</th>
                                <th>Category Name</th>
                                <th width="210px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $category = mysqli_query($con, "SELECT * FROM tbl_category ORDER BY categoryID DESC");
                            if (mysqli_num_rows($category) > 0) {
                                while ($row = mysqli_fetch_array($category)) {
                            ?>
                            <tr>
                                <td><?php echo $row['categoryID'] ?></td>
                                <td><?php echo $row['categoryName'] ?></td>
                                <td>
                                    <a class="col btn btn-orange-moon" style="width: 90px; margin-top: 0px; margin: 0px;" href="edit-category.php?id=<?php echo $row['categoryID'] ?>">Edit</a>  <a class="col btn btn-pink-moon" style="width: 95px; margin-top: 0px; margin: 0px;" href="delete-category.php?idc=<?php echo $row['categoryID'] ?>" onclick="return confirm('Delete this category?')">Delete</a>
                                </td>
                            </tr>
                            <?php }
                            } else { ?>
                            <tr>
                                <td colspan="3">There is no data</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
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