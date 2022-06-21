<?php

session_start();
include "dbFunction.php";

$userID = $_SESSION['userid'];

$readingquery = "SELECT * FROM sugarreading
          WHERE userID = '$userID'";
$result = mysqli_query($link, $readingquery) or die(mysqli_error($link));

while ($row = mysqli_fetch_assoc($result)) {

    $readingArray[] = $row;
}
mysqli_close($link);

echo json_encode($readingArray);
?>