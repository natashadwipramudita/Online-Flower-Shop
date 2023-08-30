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
    
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form id="id01" class="sign-in-form" method="POST" action="" onsubmit="return login()">
                    <h2 class="title">Log In</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" id="username" name="username" class="input-control" placeholder="Username"
                            required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" name="password" class="input-control" placeholder="Password"
                            required />
                    </div>
                    <input type="submit" name="submit" value="Login" class="btn solid" />
                    <p class="social-text">Or Log in with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>

            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>WELCOME ADMIN</h3><br>

                    <table>
                        <tr>
                            <td>----------------</td>
                        </tr>
                        <tr>
                            <th>USE THIS FORMAT TO LOG IN</th>
                        </tr>
                        <tr>
                            <td>----------------</td>
                        </tr>
                        <tr>
                            <td>
                                <ul style="font-family:Century Gothic;font-size:19px; list-style-type:none;">
                                    <li>Username : admin</li>
                                    <li>Password : admin</li>
                                </ul>
                            </td>
                        </tr>
                    </table>
                </div>
                <img src="log.svg" class="image" alt="login" />
            </div>
        </div>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    session_start();
    include 'connect.php';

    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $check = mysqli_query($con, "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password'");
      
    if(mysqli_num_rows($check) > 0){ 
        $result = mysqli_fetch_object($check);  
        $_SESSION['status_login'] = true; 
        $_SESSION['a_global'] = $result;
        $_SESSION['id'] = $result->adminID;
        echo '<script>alert("Log In Successfully")</script>';
        echo '<script>window.location="dashboard.php"</script>';
    } else {
        echo '<script>alert("Login Failed! Invalid Username or Password.")</script>';
    }
}
?>