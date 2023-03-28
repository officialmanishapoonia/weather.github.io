<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
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
                require('connection.php');
                // When form submitted, insert values into the database.
                if (isset($_REQUEST['email'])) {
                   
                    $email    = stripslashes($_REQUEST['email']);
                    $email    = mysqli_real_escape_string($conn, $email);
                    $password = stripslashes($_REQUEST['password']);
                    $password = mysqli_real_escape_string($conn, $password);
                    $query    = "INSERT into `users`
                                 VALUES ( '$email','" . md5($password) . "')";
                    $result   = mysqli_query($conn, $query);
                    if ($result) {
                        echo "<div class='form container'>
                              <h3>You are registered successfully.</h3><br/>
                              <p class='link'>Click here to <a href='login.php'>Login</a></p>
                              </div>";
                    } else {
                        echo "<div class='form container'>
                              <h3> email already exist</h3><br/>
                              <p class='link'>Click here to <a href='signup.php'>registration</a> again.</p>
                              </div>";
                    }
        } else {
            ?>
            <h1>Register</h1>
<form action="" method="POST">
            <div class=" signup-email login">
                <input type="email" placeholder="Enter email" id="email"  name="email" value=""/>


            </div>
        </br>
        
            <div class=" signup-password login">
                <input type="password" placeholder="Enter password" id="password"  name="password" value=""/>


            </div>
            <button type="submit" class="login-btn signup-btn">Submit</button>
           <h4> New Here ? <a href="login.php">Login</a></h4>
                </form>
                <?php
        }
                ?>
            <div id="result"></div>
        </div>
    </div>
</body>
</html>