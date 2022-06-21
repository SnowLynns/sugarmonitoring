$(document).ready(function () {
    $("form").submit(function () {
        var meal = $("#meal").val();
        var readings = $("#readings").val();
        var message = "";
        message += "Your Reading entered after " + meal + " is " + readings + "mmol/L" + "\n";

        if (readings <= 7.8) {
            message += "Sugar level is normal" + "\n";
        } else if (reading >= 7.9 && reading <= 11.0) {
            message += "Sugar level is elevated" + "\n";
        } else {
            message += "Sugar level is high" + "\n";
        }

        message += "Proceed to submit recordings?";
        var confirm = confirm(message); // alert(message)

        if (confirm == true) {
            return true;//submit the page
        } else {
            return false;//stay on the page
        }
    })
});