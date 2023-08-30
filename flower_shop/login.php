<?
include_once "connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>

    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="login.css">

    <style>
        .btn:hover {
            background: #13243C;
            color: #fff;
        }

        h3 {
            text-shadow: 2px 2px 2px #13243C;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form id="id01" class="sign-in-form" method="POST" action="">
                    <h2 class="title">Log In</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" id="username" name="username" class="input-control" placeholder="Username"
                            required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" class="input-control"
                            placeholder="Password" required />
                    </div>
                    <input type="submit" name="login" value="Login" class="btn solid" />
                    <p class="social-text">Find me in social platforms</p>
                    <div class="social-media">
                        <a href="https://web.facebook.com/natasha.dwipramudita" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/natnatyuhuuu" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://www.instagram.com/natnatyuhuuu/" class="social-icon">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/natasha-dwi-pramudita-31121717a/" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>
                <?php
                if (isset($_POST['login'])) {
                    session_start();
                    include 'connect.php';

                    $username = mysqli_real_escape_string($con, $_POST['username']);
                    $password = mysqli_real_escape_string($con, $_POST['password']);
                    $check = mysqli_query($con, "SELECT * FROM tbl_customer WHERE username = '$username' AND password = '$password'");

                    if (mysqli_num_rows($check) > 0) {
                        $result = mysqli_fetch_object($check);
                        $_SESSION['status_login'] = true;
                        $_SESSION['a_global'] = $result;
                        $_SESSION['id'] = $result->customerID;
                        echo '<script>alert("Log In Successfully")</script>';
                        echo '<script>window.location="home.php"</script>';
                    } else {
                        echo '<script>alert("Login Failed! Invalid Username or Password.")</script>';
                    }
                }
                ?>
                <form id="id02" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="sign-up-form">
                    <h2 class="title">Register</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" id="username" name="username" placeholder="Username" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" name="email" placeholder="Email" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-map-marked-alt"></i>
                        <input type="address" id="address" name="address" placeholder="Address" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" placeholder="Password" required />
                    </div>
                    <input type="submit" name="register" class="btn" value="Register" />
                    <p class="social-text">Find me in social platforms</p>
                    <div class="social-media">
                        <a href="https://web.facebook.com/natasha.dwipramudita" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/natnatyuhuuu" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="https://www.instagram.com/natnatyuhuuu/" class="social-icon">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/natasha-dwi-pramudita-31121717a/" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>
                <?php
                include_once "connect.php";
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $username = $_REQUEST['username'];
                    $email = $_REQUEST['email'];
                    $address = $_REQUEST['address'];
                    $password = $_REQUEST['password'];

                    if ($username == null || $email == null || $address == null || $password == null) {

                    } else {
                        $sql = "INSERT INTO `tbl_customer` (`customerID`, `username`, `email`, `address`, `password`) VALUES 
                            (NULL, 
                            '$username', 
                            '$email', 
                            '$address', 
                            '$password'
                        );";
                        $insert = mysqli_query($con, $sql);

                        if ($insert) {
                            echo '<script>alert("Register Successfully!")</script>';
                            echo '<script>window.location="login.php"</script>';
                        } else {
                            echo 'Fail to Register' . mysqli_error($con);
                        }
                    }
                }
                ?>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here?</h3><br>
                    <button class="btn transparent" id="sign-up-btn">
                        Register
                    </button>
                    <br><br>
                </div>
                <img src="log.svg" class="image" alt="login" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us?</h3><br>
                    <button class="btn transparent" id="sign-in-btn">
                        Log in
                    </button>
                    <br><br>
                </div>
                <img src="register.svg" class="image" alt="register" />
            </div>
        </div>
    </div>
    <script src="login.js"></script>
</body>

</html>