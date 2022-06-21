<?php
// php file that contains the common database connection code
include "dbFunction.php";

$username = $_POST['username'];
$password = $_POST['password'];
$height = $_POST['height'];
$weight = $_POST['weight'];

$queryCheck = "SELECT * FROM user
            WHERE username ='$username'";
$message = "";
$resultCheck = mysqli_query($link, $queryCheck) or die(mysqli_error($link));
if (mysqli_num_rows($resultCheck) == 0) {

    $query = "INSERT INTO user
          (username,password,height,weight) 
          VALUES 
          ('$username',SHA1('$password'),'$height',
           '$weight')";

    $status = mysqli_query($link, $query);
    if ($status) {
        $message = "<p>Your new account has been successfully created. 
                You are now ready to <a href='index.php'>login</a>.</p>";
    } else {
        $message = "Account creation failed, please try again :(";
    }
} else {
    $message = "<p> The username $username already exists. </p>";
}
mysqli_close($link);
?>

<!DOCTYPE HTML>
<html>
    <style>

        div.navbar-header {
            margin: 10px;
        }
    </style>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
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
            <a class="navbar-brand" href="#">Sugar Monitoring App - Register</a>
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
        echo $message;
        ?>
    </body>
</html>