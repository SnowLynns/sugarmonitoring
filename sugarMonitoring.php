<?php
include("dbFunction.php");

mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sugar Monitoring App</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.6.0.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <script>
            $(document).ready(function () {
                $.ajax({
                    type: "GET",
                    url: "http://localhost/c203_skill_test_material/getReading.php",
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {
                        var message = "<thead><tr><th>Date</th><th>After-Meals Reading</th><th>Readings</th><tr></thead><tbody>"
                        for (i = 0; i < response.length; i++) {
                            message += "<tr><td>" + response[i].readingDate + "</td>"
                                    + "<td>" + response[i].readingTimes + "</td><td>" + response[i].readingLvl + "</td></tr>";
                        }
                        message += "</tbody>";
                        $("#bloodreading").html(message);
                    },
                    error: function (obj, textStatus, errorThrown) {
                        console.log("Error " + textStatus + ": " + errorThrown);
                    }

                });
            });
        </script>

        <style>
            div.container {
                margin-top: 100px;
            }
            .table {
                border-spacing:100px;
            }
        </style>
    </head>
    <body style="background-image: url('background2.gif');">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <img src="logo.png" width="50" align="left"/>
            <a class="navbar-brand" href="">Sugar Monitoring App</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                </ul>	
                <form class="form-inline" method="post" action="doLogOut.php" >
                    <button type="submit" class="btn btn-outline-warning">Logout</button>
                </form>
            </div>
        </nav>
    </body>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <h1><b>Blood Sugar Level Readings</b></h1>
                <hr/>
                <form id="formsubmit" method="post" action="insertReading.php">
                    <h4>Reading taken after:</h4>
                    <select class="form-control form-control-lg" id="meal" name="meal">
                        <option value="breakfast">Breakfast</option>
                        <option value="lunch">Lunch</option>
                        <option value="dinner">Dinner</option>
                    </select>
                    <h5>Readings are to be taken 2 hours after each meal.</h5>
                    <h4><label for="readings">Blood Sugar Readings (mmol/L):</label></h4>
                    <input type="number" class="form-control" id="readings" name="readings"/>
                    <br>
                    <button type="submit" id="reading" class="btn btn-primary btn-block">Enter</button>
                </form>
            </div>

            <div class="row col-lg-9">
                <table class="table table-info table-striped" id="bloodreading">
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">After-Meals Reading</th>
                            <th scope="col">Readings (mmol/L)</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</html>