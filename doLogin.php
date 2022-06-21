<?php
session_start();

// php file that contains the common database connection code
include "dbFunction.php";

$entered_username = $_POST['username'];
$entered_password = $_POST['password'];

$msg = "";

$queryCheck = "SELECT * FROM user
          WHERE username='$entered_username'
          AND password = SHA1('$entered_password')";

$resultCheck = mysqli_query($link, $queryCheck) or die(mysqli_error($link));

if (mysqli_num_rows($resultCheck) == 1) {
    $row = mysqli_fetch_array($resultCheck);
    $_SESSION['userid'] = $row['userid'];
    $_SESSION['username'] = $row['username'];
//
//    if (isset($_POST['remember'])) {
//        setcookie("username", $row['username'], time() + 3600 * 24 * 100);
//    }

    //refreshes page and automatically directs to sugarMonitoring page if user+password is correct
    header("location: sugarMonitoring.php");
    $_SESSION['weight'] = $row['weight'];
    $_SESSION['height'] = $row['height'];
} else {
    $msg = "<p> Invalid username or password! Sorry, you must enter a valid username and password to log in. </p>";
    $msg .= "<p><a href='index.php'>Go back to login page</a></p>";
}
?>
<!DOCTYPE html>
<html lang="en">
    <style>
        div.navbar-header {
            margin: 10px;
        }
    </style>
    <head>
        <title>Sugar Monitoring App - Keep track of your sugar levels!</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body style="background-image: url('background.gif');">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <img src="logo.png" width="50" align="left"/>
            <a class="navbar-brand" href="#">Sugar Monitoring App Login</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
			<ul class="navbar-nav mr-auto">
			</ul>	
                <form class="form-inline" method="post" action="doLogin.php">
                    <input class="form-control" type="text" placeholder="Username"id="idUsername" name="username"/>
                    <input class="form-control" type="password" placeholder="Password" id="idPassword" name="password"/>
                    <button type="submit" class="btn btn-outline-success" type="submit">Login</button>
                </form>
            </div>
        </nav>
        <?php
        echo $msg;
        ?>
    </body>
</html>