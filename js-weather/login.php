<?php
require('connection.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bona+Nova:ital,wght@0,400;0,700;1,400&family=Poppins:ital,wght@0,100;0,200;0,300;0,500;0,600;0,800;1,200;1,300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <div class="shape shape-1">

        </div>
        <div class="shape shape-2">
            
        </div>
        <div class="container">
        <?php
                   
                   if (isset($_POST['email'])) {
                    $email = stripslashes($_REQUEST['email']);    // removes backslashes
                    $email = mysqli_real_escape_string($conn, $email);
                    $password = stripslashes($_REQUEST['password']);
                    $password = mysqli_real_escape_string($conn, $password);
            $password = md5($password);
                    // Check user is exist in the database
                    $query    = "SELECT * FROM `users` WHERE email='$email' AND password='$password'";
                    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
                    $rows = mysqli_num_rows($result);
                    if ($rows == 1) {
                       

                        $_SESSION['email'] = $email;
                        // Redirect to user dashboard page
                        header("Location: index.php");
                    } else {
                        echo "<div class='form container'>
                              <h3>Incorrect Username/password.</h3><br/>
                              <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                              </div>";

                    }
                } else {
            ?>
            <h1>Login</h1>
            <form method="POST" action="">

            <div class=" login-email login">
                <input type="email" placeholder="Enter email" id="email" value="" name="email"/>


            </div>
        </br>
        
            <div class=" login-password login">
                <input type="password" placeholder="Enter password" id="password" value="" name="password"/>


            </div>
            <button type="submit" class="login-btn">Submit</button>

           <h4> Forgot Password? <a href="signup.php">Signup</a></h4>
</form>
<?php
    }
?>
        </div>
    </div>
</body>
</html>