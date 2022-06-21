<?php
session_start();
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
        <script src="js/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
    </head>
    <body style="background-image: url('background.gif');">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <img src="logo.png" width="50"/>
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

        <div align="center">
            <br></br>
            <h3>Register with us TODAY!</h3>
            <form method="post" action="doRegister.php">
                <br></br>
                <div class="form-group row-cols-4">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" name="username" placeholder="Username">
                </div>
                <div class="form-group row-cols-4">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group row-cols-4">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-object-align-bottom"></i></span>
                    <input type="text" class="form-control" name="height" placeholder="Height in cm">
                </div>
                <div class="form-group row-cols-4">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-scale"></i></span>
                    <input type="text" class="form-control" name="weight" placeholder="Weight in kg">
                </div>
                <div class="form-group row-cols-4">
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </div>
            </form>
        </div>
    </body>
</html>

</body>
</html>
