<?php
session_start();
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | Natnat Fleuriste</title>

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

        .form {
            background-color: #fefefe;
            margin: 0% auto 0% auto;
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
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        a.social {
            display: inline-block;
            width: 40px;
            height: 40px;
            color: #fff;
            border-radius: 50%;
            background-color: #2193b0;
            line-height: 40px;
            font-size: 20px;
        }

        a.social:hover {
            background: whitesmoke;
            color: #130f40;
            border: 1px solid #130f40;
        }
    </style>
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
            <div class="box">
                <i class="far fa-smile-beam"></i>
                <img src="https://cdn-icons-png.flaticon.com/512/3259/3259776.png" alt="flower cart">
                <div class="content">
                    <h3>See Cart</h3>
                    <span>in Products</span>
                </div>
            </div>
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
            <p>Know About Us</p>
            <a href="#about" class="btn">See Now</a>
        </div>

    </section>

    <!-- home section ends -->

    <!-- about section starts  -->

    <section class="about" id="about" name="about">

        <h1 class="heading"> About <span>Us</span> </h1>

        <div class="form">
            <form action="" method="POST">
                <div class="imgcontainer">
                    <img src="https://cdn-icons-png.flaticon.com/512/508/508967.png" alt="Flower Shop" class="avatar">
                </div>
                <br>
                <div class="form-floating mb-3" align="center">
                    <h2 style="font-weight: bolder;">NATNAT FLEURISTE</h2>
                    <h6><br></h6>
                    <p style="font-size: 15px;">Natnat Fleuriste delivers flowers every day. This shop is
                        available for your convenience on this well-organized and user-friendly website. Natnat
                        Fleuriste
                        is the only place to look for the best flower products.</p>
                </div>
            </form>
        </div>

        <h1><br></h1>
        <h1 class="heading"> About <span>Developer</span> </h1>
        
        <div class="form">
            <form action="" method="POST">
                <div class="imgcontainer">
                    <img src="natasha.png" alt="Developer" class="avatar">
                </div>
                <br>
                <div class="form-floating mb-3" align="center">
                    <h2 style="font-weight: bolder;">NATASHA DWI PRAMUDITA</h2>
                    <h6><br></h6>
                    <p>
                        <a href="https://api.whatsapp.com/send?phone=62895366996023" class="social"><i
                                class="fab fa-whatsapp"></i></a>
                        <a href="https://web.facebook.com/natasha.dwipramudita" class="social"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/natnatyuhuuu/" class="social"><i
                                class="fab fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/in/natasha-dwi-pramudita-31121717a/" class="social"><i
                                class="fab fa-linkedin-in"></i></a>
                    </p>
                </div>
            </form>
        </div>
    </section>

    <!-- about section ends -->

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